import React, {PropTypes as T} from 'react';
import ReactDOM from 'react-dom'
import { camelize } from './lib/String'
import {makeCancelable} from './lib/cancelablePromise'
import invariant from 'invariant'
Numbers = require('../res/values').numbers;

const mapStyles = {
  container: {
    position: 'absolute',
    width: '100vw',
    height: Numbers.mapHeight
  },
  map: {
    position: 'absolute',
    left: Numbers.toggleWidth,
    right: 0,
    bottom: 0,
    top: 0
  }
}

const countryGeo = require('../res/json/countries.geo.json');
const usStatesGeo = require('../res/json/us-states.geo.json');

const evtNames = [
  'ready',
  'click',
  'dragend',
  'recenter',
  'bounds_changed',
  'center_changed',
  'dblclick',
  'dragstart',
  'heading_change',
  'idle',
  'maptypeid_changed',
  'mousemove',
  'mouseout',
  'mouseover',
  'projection_changed',
  'resize',
  'rightclick',
  'tilesloaded',
  'tilt_changed',
  'zoom_changed'
];

var geoFilters;
var selectedGeos = [];

export {wrapper as GoogleApiWrapper} from './GoogleApiComponent'
export {Marker} from './components/Marker'
export {InfoWindow} from './components/InfoWindow'
export {HeatMap} from './components/HeatMap'

export class Map extends React.Component {
    constructor(props) {
        super(props)

        invariant(props.hasOwnProperty('google'),
                    'You must include a `google` prop.');

        this.listeners = {}
		
        this.state = {
          currentLocation: {
            lat: this.props.initialCenter.lat,
            lng: this.props.initialCenter.lng
          },
					hasGeos: false
        }
    }

    componentDidMount() {
			if (this.props.centerAroundCurrentLocation) {
        if (navigator && navigator.geolocation) {
          this.geoPromise = makeCancelable(
            new Promise((resolve, reject) => {
              navigator.geolocation.getCurrentPosition(resolve, reject);
            })
          );

        this.geoPromise.promise.then(pos => {
            const coords = pos.coords;
            this.setState({
              currentLocation: {
                lat: coords.latitude,
                lng: coords.longitude
              }
            })
          }).catch(e => e);
        }
      }
      this.loadMap();
    }

    componentDidUpdate(prevProps, prevState) {
      if (prevProps.google !== this.props.google) {
        this.loadMap();
      }
      if (this.props.visible !== prevProps.visible) {
        this.restyleMap();
      }
      if (this.props.zoom !== prevProps.zoom) {
        this.map.setZoom(this.props.zoom);
      }
      if (this.props.center !== prevProps.center) {
        this.setState({
          currentLocation: this.props.center
        })
      }
      if (prevState.currentLocation !== this.state.currentLocation) {
        this.recenterMap();
      }
    }

    componentWillUnmount() {
      const {google} = this.props;
      if (this.geoPromise) {
        this.geoPromise.cancel();
      }
      Object.keys(this.listeners).forEach(e => {
        google.maps.event.removeListener(this.listeners[e]);
      });
    }
		
		componentWillReceiveProps(nextProps) {
			if (nextProps.geoFiltering && !this.state.hasGeos) {
				console.log('Loading ' + nextProps.geoFiltering + '...');
				
				var geos;
				switch (nextProps.geoFiltering) {
					case 'Countries':
						geos = countryGeo;
						break;
					case 'US States':
						geos = usStatesGeo;
						break;
					default:
						geos = countryGeo;
				}
				
        geoFilters = this.map.data.addGeoJson(geos);
				for (var i = 0; i < geoFilters.length; i++) {
					if (geoFilters[i].getProperty('name') == "Antarctica") {
						this.map.data.remove(geoFilters[i]);
					}
				}
				
				this.setState({
					hasGeos: true
				});
			} else if (nextProps.geoFiltering == null && this.state.hasGeos && geoFilters && geoFilters.length > 0) {
				console.log('Clearing geoFilters...');
				
				for (var i = 0; i < geoFilters.length; i++) {
					this.map.data.remove(geoFilters[i]);
				}
				
				geoFilters = null;
				
				this.setState({
					hasGeos: false
				});
				
				this.props.onFilter(selectedGeos);
			}
		}
		
		setupCountries() {
			// Color each shape gray. Change the color when the isColorful property
			// is set to true.
			this.map.data.setStyle(function(feature) {
				var color = 'gray';
				if (feature.getProperty('isColorful')) {
					color = 'green';
				}
				return /** @type {google.maps.Data.StyleOptions} */({
					fillColor: color,
					strokeColor: color,
					strokeWeight: 2
				});
			});

			// When the user clicks, set 'isColorful', changing the color of the letters.
			this.map.data.addListener('click', function(event) {
				event.feature.setProperty('isColorful', !event.feature.getProperty('isColorful'));
				
				var testArray = [];
				for (var i = 0; i < selectedGeos.length; i++) {
					testArray.push(selectedGeos[i].id);
				}
				
				if (testArray.includes(event.feature.getId())) {
					selectedGeos.splice(testArray.indexOf(event.feature.getId()), 1);
				} else {
					selectedGeos.push({
						id: event.feature.getId(),
						geometry: event.feature.getGeometry()
					});
				}
			});

			// When the user hovers, tempt them to click by outlining the letters.
			// Call revertStyle() to remove all overrides. This will use the style rules
			// defined in the function passed to setStyle()
			this.map.data.addListener('mouseover', function(event) {
				this.map.data.revertStyle();
				this.map.data.overrideStyle(event.feature, {strokeWeight: 8});
			});

			this.map.data.addListener('mouseout', function(event) {
				this.map.data.revertStyle();
			});
		}

    loadMap() {
      if (this.props && this.props.google) {
        const {google} = this.props;
        const maps = google.maps;

        const mapRef = this.refs.map;
        const node = ReactDOM.findDOMNode(mapRef);
        const curr = this.state.currentLocation;
        const center = new maps.LatLng(curr.lat, curr.lng);

        const mapTypeIds = this.props.google.maps.MapTypeId || {};
        const mapTypeFromProps = String(this.props.mapType).toUpperCase();

        const mapConfig = Object.assign({}, {
          mapTypeId: mapTypeIds[mapTypeFromProps],
          center: center,
          zoom: this.props.zoom,
          maxZoom: this.props.maxZoom,
          minZoom: this.props.maxZoom,
          clickableIcons: this.props.clickableIcons,
          disableDefaultUI: this.props.disableDefaultUI,
          zoomControl: this.props.zoomControl,
          mapTypeControl: this.props.mapTypeControl,
          scaleControl: this.props.scaleControl,
          streetViewControl: this.props.streetViewControl,
          panControl: this.props.panControl,
          rotateControl: this.props.rotateControl,
          scrollwheel: this.props.scrollwheel,
          draggable: this.props.draggable,
          keyboardShortcuts: this.props.keyboardShortcuts,
          disableDoubleClickZoom: this.props.disableDoubleClickZoom,
          noClear: this.props.noClear,
          styles: this.props.styles,
          gestureHandling: this.props.gestureHandling
        });

        Object.keys(mapConfig).forEach((key) => {
          // Allow to configure mapConfig with 'false'
          if (mapConfig[key] == null) {
            delete mapConfig[key];
          }
        });

        this.map = new maps.Map(node, mapConfig);
				
				this.setupCountries();
				
				if (this.props.geoFiltering && !this.state.hasGeos) {
					this.map.data.addGeoJson(countryGeo);
				}

        evtNames.forEach(e => {
          this.listeners[e] = this.map.addListener(e, this.handleEvent(e));
        });
        maps.event.trigger(this.map, 'ready');
        this.forceUpdate();
      }
    }

    handleEvent(evtName) {
      let timeout;
      const handlerName = `on${camelize(evtName)}`

      return (e) => {
        if (timeout) {
          clearTimeout(timeout);
          timeout = null;
        }
        timeout = setTimeout(() => {
          if (this.props[handlerName]) {
            this.props[handlerName](this.props, this.map, e);
          }
        }, 0);
      }
    }

    recenterMap() {
        const map = this.map;

        const {google} = this.props;
        const maps = google.maps;

        if (!google) return;

        if (map) {
          let center = this.state.currentLocation;
          if (!(center instanceof google.maps.LatLng)) {
            center = new google.maps.LatLng(center.lat, center.lng);
          }
          // map.panTo(center)
          map.setCenter(center);
          maps.event.trigger(map, 'recenter')
        }
    }

    restyleMap() {
      if (this.map) {
        const {google} = this.props;
        google.maps.event.trigger(this.map, 'resize');
      }
    }

    renderChildren() {
      const {children} = this.props;

      if (!children) return;

      return React.Children.map(children, c => {
        return React.cloneElement(c, {
          map: this.map,
          google: this.props.google,
          mapCenter: this.state.currentLocation
        });
      })
    }

    render() {
			const style = Object.assign({}, mapStyles.map, this.props.style, {
        display: this.props.visible ? 'inherit' : 'none'
      });

      const containerStyles = Object.assign({},
        mapStyles.container, this.props.containerStyle)

      return (
        <div style={containerStyles} className={this.props.className}>
          <div style={style} ref='map'>
            Loading map...
          </div>
          {this.renderChildren()}
        </div>
      )
    }
};

Map.propTypes = {
  google: T.object,
  zoom: T.number,
  centerAroundCurrentLocation: T.bool,
  center: T.object,
  initialCenter: T.object,
  className: T.string,
  style: T.object,
  containerStyle: T.object,
  visible: T.bool,
  mapType: T.string,
  maxZoom: T.number,
  minZoom: T.number,
  clickableIcons: T.bool,
  disableDefaultUI: T.bool,
  zoomControl: T.bool,
  mapTypeControl: T.bool,
  scaleControl: T.bool,
  streetViewControl: T.bool,
  panControl: T.bool,
  rotateControl: T.bool,
  scrollwheel: T.bool,
  draggable: T.bool,
  keyboardShortcuts: T.bool,
  disableDoubleClickZoom: T.bool,
  noClear: T.bool,
  styles: T.array,
  gestureHandling: T.string
}

evtNames.forEach(e => Map.propTypes[camelize(e)] = T.func)

Map.defaultProps = {
  zoom: 5,
  initialCenter: {
    lat: 37.774929,
    lng: -122.419416
  },
  center: {},
  centerAroundCurrentLocation: true,
  style: {},
  containerStyle: {},
  visible: true
}

export default Map;
