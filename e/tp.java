  public class tp {
  
    public static void  main(String[] args) {      
      Voi v1 = new Voi(50,50,"FERRARI"); // Crée une nouvelle voiture
    v1.vitesse=50;
    v1.puissance=50;
    v1.marque="ferrari";
   v1.incrementer();
   v1.decrementer();
   v1.incrementer(5);
   v1.decrementer(10);
   v1.setmarque("toyota");
   System.out.println(v1.getmarque());
 
    }
    
}