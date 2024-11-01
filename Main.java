class InformationPerso {
    private String nom;
    private String prenom;
    private String groupeSanguin;
    private String numCompte;

    public InformationPerso(String nom, String prenom, String groupeSanguin, String numCompte) {
        this.nom = nom;
        this.prenom = prenom;
        this.groupeSanguin = groupeSanguin;
        this.numCompte = numCompte;
    }


    public String toString() {
        return "Nom: " + nom + ", Prénom: " + prenom + ", Groupe sanguin: " + groupeSanguin + ", Numéro de compte: " + numCompte;
    }
}

class Departement {
    private String numDept;
    private String nomDept;

    public Departement(String numDept, String nomDept) {
        this.numDept = numDept;
        this.nomDept = nomDept;
    }

    @Override
    public String toString() {
        return "Numéro de département: " + numDept + ", Nom du département: " + nomDept;
    }
}

class Manager {
    private String id;
    private float salaire;
    private InformationPerso info;
    private Departement dept;

    public Manager(String id, float salaire, String nom, String prenom, String groupeSanguin, String numCompte, Departement dept) {
        this.id = id;
        this.salaire = salaire;
        this.info = new InformationPerso(nom, prenom, groupeSanguin, numCompte);
        this.dept = dept;
    }

    @Override
    public String toString() {
        return "ID: " + id + ", Salaire: " + salaire + ", " + info + ", " + dept;
    }
}

public class Main {
    public static void main(String[] args) {
        Departement rh = new Departement("001", "RH");
        Departement comptabilite = new Departement("002", "Comptabilité");
        Departement it = new Departement("003", "IT");

        Manager moh = new Manager("M001", 5000, "Moh", "Mohamed", "A+", "123456789", it);
        Manager rida = new Manager("M002", 6000, "Rida", "Nawel", "AB-", "987654321", rh);

        System.out.println("Départements:");
        System.out.println(rh);
        System.out.println(comptabilite);
        System.out.println(it);

        System.out.println("\nManagers:");
        System.out.println(moh);
        System.out.println(rida);
        
    }

}
