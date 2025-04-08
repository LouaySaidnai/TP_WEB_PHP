<?php 
/**
 * cette classe represente un etudiant et ces notes 
 */
class Etudiant {
    /**
     * @var string le nom d'etudiant
     */
    private $nom;
    /**
     * @var array les notes d'etudiant
     */
    private $notes;
    public function __construct($nom="",$notes=array())
    {
        $this->nom=$nom;
        $this->notes=$notes;
    }
    public function getNom() {
        return $this->nom;
    }
    public function getNotes() {
        return $this->notes;
    }
    public function ajouterNote($note) {
        if (is_numeric($note) && $note >= 0 && $note <= 20) {
            $this->notes[] = $note;
        } else {
            echo "Erreur : La note doit etre un nombre entre 0 et 20.\n";
        }
    }
    /**
     * affichage des notes 
     */
    public function afficheNotes (){
        foreach($this->notes as $note){
            echo $note."<br>";
        }
    }
    /**
     * calcul moyenne 
     */
    public function calculMoyenne(){
        $somme=0;
        foreach($this->notes as $note){
            $somme+=$note;
        }
        return $somme/count($this->notes);
    }
     /**
      * verifier si etudiant est admis ou non
      */
      public function verifier() {
        if ($this->calculMoyenne($this->notes) < 10) {
            echo "L'étudiant " . $this->getNom() . " est non admis.<br>";
        } else {
            echo "L'étudiant " . $this->getNom() . " est admis.<br>";
        }
    }
    /**
     * affichage de la table 
     */
    public function affichetable(){
        echo "<table class='table'>";
        echo "<thead><tr><th scope='col'>{$this->getNom()}</th></tr></thead>";
        echo "<tbody>";
        foreach($this->notes as $note){
            $class = ($note > 10) ? "table-success" : (($note < 10) ? "table-danger" : "table-warning");
            echo "<tr class=$class><th scope='row'>$note</th></tr>";
        }
        echo "<tr class='table-primary'><th scope='row'>Votre moyenne est {$this->calculMoyenne()}</th></tr></tbody></table>";
    }
}
?>