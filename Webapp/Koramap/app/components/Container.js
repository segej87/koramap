React = require('react');
var Keys = require('../res/values').keys;
const mapStyles = require('../styles/map/mapStyles');
const Geoutils = require('../src/utils/Geoutils');

var GoogleApiWrapper = require('../src/index').GoogleApiWrapper
var Map = require('../src/index').Map
import Marker from '../src/components/Marker'
import Polygon from '../src/components/Polygon'
import InfoWindow from '../src/components/InfoWindow'

var google;
var filterGeos = [];
var lastLoadRecords;

var Container = React.createClass({
  getInitialState: function() {
    return {
      activeMarker: {},
      selectedPlace: {},
	  hasMarkers: false
    }
  },
	
	//TODO: wrap in promsise?
  processData: function (features) {
	  if (features == 'reset') {
		  delete this.markers;
			this.setState({
				hasMarkers: false
			});
		  return;
	  }
		
		console.log('Processing');
		
		// let geoFilteredFeats = this.filterGeo(features);
		let filteredGeos = Geoutils.filterGeo(filterGeos, features, google);
		let geoFilteredFeats = filteredGeos.geoFilteredFeats;
		this.props.setWorkingSet(filteredGeos.workingSet);
	  
	  if (this.markers) {
		  var currentIds = [];
		  for (var i = 0; i < this.markers.length; i++) {
				currentIds.push(this.markers[i].key);
		  }
		  
		  var featureIds = [];
		  for (var i = 0; i < geoFilteredFeats.length; i++) {
			  featureIds.push(geoFilteredFeats[i].id);
		  }
		  
		  var newMarkers = [];
		  for (var i = 0; i < currentIds.length; i++) {
			  if (featureIds.includes(currentIds[i])) {
				  newMarkers.push(this.markers[i])
			  }
		  }
		  
		  for (var i = 0; i < featureIds.length; i++) {
			  if (!currentIds.includes(featureIds[i])) {
				  const feature = geoFilteredFeats[i];
				  newMarkers.push(
					<Marker key={feature.id} 
					  onClick={this.onMarkerClick} 
					  fuid={feature.id}
					  name={feature.properties.name} 
					  submitter={feature.properties.submitter} 
					  datetime={feature.properties.datetime} 
					  tags={feature.properties.tags} 
					  featureProps={feature.properties} 
					  position={{lat: feature.geometry.coordinates[1], lng: feature.geometry.coordinates[0]}}/>
				  );
			  }
		  }
		  
		  this.markers = newMarkers;
	  } else {
		  this.markers = geoFilteredFeats.map((feature, i) => {
			  return (
			  <Marker key={feature.id} 
			  onClick={this.onMarkerClick} 
			  fuid={feature.id}
			  name={feature.properties.name} 
			  submitter={feature.properties.submitter} 
			  datetime={feature.properties.datetime} 
			  tags={feature.properties.tags} 
			  featureProps={feature.properties} 
			  position={{lat: feature.geometry.coordinates[1], lng: feature.geometry.coordinates[0]}}/>
			  );
		  });
	  }
	  
	  this.setState({
		  hasMarkers: true
	  });
  },
	
	//TODO: move up to MapContainer
	receiveGeo: function (polygons) {
		filterGeos = polygons;
		this.processData(this.props.records.features);
	},
  
  onMarkerClick: function(props, marker, e) {
    this.setState({
      selectedPlace: props,
      activeMarker: marker
    });
	
	this.props.handleSelected(this.state.selectedPlace);
  },

  onInfoWindowClose: function() {
    this.setState({
			selectedPlace: {},
      activeMarker: null
    })
	
	this.props.handleSelected(this.state.selectedPlace);
  },

  onMapClicked: function(props) {
    if (Object.keys(this.state.selectedPlace).length > 0) {
      this.setState({
				selectedPlace: {},
        activeMarker: null
      })
	  
	  this.props.handleSelected(this.state.selectedPlace);
    }
  },
	
	componentDidUpdate(prevProps, prevState) {
		if (prevProps.google != this.props.google) {
			google = this.props.google;
		}
	},
  
  componentWillReceiveProps: function (nextProps) {
	  if (nextProps.userInfo.userId != this.props.userInfo.userId) {
		  this.props.resetRecords();
	  }
	  
		// TODO: Cut down on processing of features
	  if (nextProps.records.features && nextProps.records.updated != lastLoadRecords) {
			lastLoadRecords = nextProps.records.updated;
			this.processData(nextProps.records.features);
	  } else if (nextProps.records.features == null || Object.keys(nextProps.records.features).length == 0) {
		  this.processData('reset');
	  }
		
		if (nextProps.geoFiltering && !this.props.geoFiltering) {
			this.setState({
				hasMarkers: false
			});
		}
  },
  
  render() {
	if (!this.props.loaded) {
		return <div style={{textAlign: 'center', paddingTop: 75, fontSize: 24, color: 'white'}}>Loading Map...</div>
	}
	
	if (!this.state.hasMarkers || this.props.geoFiltering) {
		return (
			<div>
				<Map google={google}
				  zoom={5}
				  onClick={this.onMapClicked}
				  guid={this.props.userInfo.userId}
					geoFiltering={this.props.geoFiltering}
					onFilter={this.receiveGeo}>
			  </Map>
			  </div>
		);
	}
	
    return (
      <div>
				<Map google={google}
          zoom={5}
          onClick={this.onMapClicked}
					guid={this.props.userInfo.userId}
					geoFiltering={this.props.geoFiltering}
					onFilter={this.receiveGeo}>
					{this.markers}
				</Map>
	  </div>
    )
  }
});

export default GoogleApiWrapper({
  apiKey: Keys.gApi
})(Container)