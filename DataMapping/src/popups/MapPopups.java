package popups;

import org.json.JSONArray;
import org.json.JSONException;

import de.fhpotsdam.unfolding.UnfoldingMap;
import de.fhpotsdam.unfolding.marker.Marker;
import processing.core.PApplet;

public abstract class MapPopups extends PApplet{
	
	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;
	
	UnfoldingMap map;
	PApplet p;
	Marker mark;
	private float intX;
	private float intY;
	private boolean[] quadrant;
	private int intWidth;
	private float intHeight;
	private int color;
	protected float fontSize = 13;
	
	//abstract method for drawing subclasses
	public abstract void drawPop();
	
	public abstract String getSubType();

	public MapPopups(UnfoldingMap m, PApplet p, Marker mark){
		this.map = m;
		this.p = p;
		this.mark = mark;
	}
	
	public void draw(){
		p.pushStyle();
		drawPop();
		p.popStyle();
	}
	
	// MARK: Helper methods
	public String[] getStringArrayFromJSONArray(JSONArray arr) {
		if (arr == null) return null;
		
		String[] temp = new String[arr.length()];
		for (int i=0; i < arr.length(); i++) {
			try {
				temp[i] = arr.getString(i);
			} catch (JSONException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
		return temp;
	}
	
	//getters and setters for click quadrant
	public void calcQuadrant(float x, float y){
		boolean[] quad = new boolean[2];
		quad[0] = x > 200 + map.getWidth()/2;
		quad[1] = y > 50 + map.getHeight()/2;
		setQuadrant(quad);
	}
	
	public void setQuadrant(boolean[] q){
		this.quadrant = q;
	}
	
	public boolean[] getQuadrant(){
		return quadrant;
	}
	
	public Marker getMarker(){
		return this.mark;
	}
	
	//getter of marker properties (no setter)
	public Object getProp(String p){
		return mark.getProperty(p);
	}
	
	//setters and getters for interface x and y coordinates
	public void setIntX(float x){
		this.intX = x;
	}
	
	public void setIntY(float y ){
		this.intY = y;
	}
	
	public float getIntX(){
		return this.intX;
	}
	
	public float getIntY(){
		return this.intY;
	}
	
	//setters and getters for interface width and height
	
	public void setIntWidth(int w){
		this.intWidth = w;
	}
	
	public int getIntWidth(){
		return this.intWidth;
	}
	
	public void setIntHeight(float h){
		this.intHeight = h;
	}
	
	public float getIntHeight(){
		return this.intHeight;
	}
	
	//setters and getters for color
	public void setColor(){
		if (getProp("datatype").equals("photo")){
			this.color = p.color(255,100,100);
		} else if (getProp("datatype").equals("note")){
			this.color = p.color(100, 100, 255);
		}
	}
	
	public void setColor(int c){
		this.color = c;
	}
	
	public int getColor(){
		return this.color;
	}
}
