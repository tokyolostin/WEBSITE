public class Voi {
    public double puissance;
    public double vitesse ;
    public String marque;
    public String couleur;
     //constructeur 
   public Voi(double puissance,double vitesse,String marque ,String couleur){
    this.marque = marque;
    this.vitesse = vitesse;
    this.puissance = puissance;
    this.couleur = couleur;

   }
    //fonction qui ne retourn rien incrementation  ;

public  void incrementer() {
  vitesse=vitesse+1;
  System.out.println(" la vitesse apre l'incrementation");
  System.out.println(vitesse);
}
 //fonction qui ne retourn rien d'incrementation 

public void decrementer() {
   vitesse = vitesse-1;
   System.out.println(" la vitesse apre decrementation");
   System.out.println(vitesse);
}

public  void incrementer(int i ) {
    vitesse=vitesse+i;
    System.out.println(" la vitesse apre l'incrementation");
    System.out.println(vitesse);
  }
  
  
  public void decrementer(int i) {
     vitesse = vitesse-i;
     System.out.println(" la vitesse apre decrementation");
     System.out.println(vitesse);
  }
  public String getmarque() {
    return marque;
}

public void setmarque(String marque) {
    this.marque = marque;
}
public   double getvitesse() {
    return vitesse;
}

public void setvitesse(double vitesse) {
    this.vitesse = vitesse;
}
public   double getpuissance() {
    return vitesse;
}

public void setpuissance(double puissance) {
    this.puissance = puissance;
}
public String toString() {
    return " Marque: " + marque + ", Vitesse: " + vitesse + ", Puissance: " + puissance;
}
 public Voi (Voi autrVoi){
    this.puissance= autrVoi.puissance;
    this.vitesse= autrVoi.vitesse;
    this.marque= autrVoi.marque;
 }
 public Voi (Voi autrVoi,String nouvellecouleur){
    this(autrVoi);
     this.couleur=nouvellecouleur;

 }
  public void eqquals(double puissance , double vitesse){
    if( vitesse = puissance ){

    }
  }


 
 }




