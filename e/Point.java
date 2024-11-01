public class Point {
     public  int x;
      public int y ;


public Point() {
     x=4;
     y=3;
   
}
public Point(int x,int y ) {
    this.x = x;
    this.y = y;
  
}
public void setabscisse(int x) {
    this.x = x;
}
public   double getabscisse() {
    return x;
}
public void setordonne(int y) {
    this.y = y;
}
public   double getordonne() {
    return y;
}

public  void  translate(int x ,int y ) {
   this.x +=x;
       this.y+=y;
    System.out.println(this.x);
    System.out.println(this.y);


 } 
 public  void  distance(int point  ) {

Math.sqrt(math)
}
