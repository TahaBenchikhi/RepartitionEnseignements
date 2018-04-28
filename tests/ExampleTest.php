<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Faker\Generator as Facker;
class ExampleTest extends TestCase
{


    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->visit('/login')
            ->type('repartiteur@gmail.com', 'email')
            ->type("0000", 'password')
            ->press('Se connecter');
    }

    public function testEnseignant()
    {
        $form = $this->visit('/')->getForm();
        $this->visit('/')
            ->makeRequestUsingForm($form)
            ->see('Login')
            ->type('enseignant@gmail.com', 'email')
            ->type("0000", 'password')
            ->press('Se connecter')
            ->visit('/')
            ->visit('/profil')
            ->visit('/historiquePersonnel')
            ->visit('/Voeux')
            ->type('text.....................;;', 'commentaire')
            ->press("sub")
            ->visit('/listeUEEns')
            ->visit('/ficheUEEns/21')
            ->visit('/listePersoEns')
            ->visit('/fichePersoEns/1')
            ->visit('/MessagePage')
            ->post('/getid',['id' => 'AX203'])
        ;


    }
    public function testRepartiteur()
    {
        $form = $this->visit('/')->getForm();
        $this->visit('/')
            ->makeRequestUsingForm($form)
            ->see('Login')
            ->type('repartiteur@gmail.com', 'email')
            ->type("0000", 'password')
            ->press('Se connecter')
            ->visit('/');
        $this->visit('/')
            ->see('Changer de Mode')
            ->visit('/MessagePage')
            ->seePageIs('/MessagePage')
            ->see('Envoyé')
            ->visit('/Repartition')
            ->see('Valider')
            ->see('Session actuelle')
            ->click('Valider')
            ->visit('/profil')
            ->visit('/historiquePersonnel')
            ->visit('/DemarrerSessions')
            ->visit('/Repartition')
            ->visit('/listeUERep')
            ->visit('/ficheUERep/18')
            ->visit('/listePersoRep')
            ->visit('/fichePersoRep/4')
            ->visit('/AjoutUe')
            ->visit('/AjoutEns')
            ->visit('/MessagePage')


        ;


    }
    public function testMessageController()
    {
        $this->visit('/MessagePage')->see('La liste');
        $class = new \App\Http\Controllers\MainControllers\MessagesController();
        $class->Get_messages();

        $this->post('/EnvoiMessage',[
        'message'=>'fffffffff',
        'sujet'=>'sdsdsdsdsd',
        'destinataire' => [
            0 => '1'
        ]

    ]);
        $this->post('/vu',[
            'id'=>'1',
            'action'=>'vu',
        ]);
        $this->seeInDatabase('messages', [
        'contenu'=>'fffffffff'
    ]);
        $this->post('/MessageExtern',[
            'message'=>'fffffffff',
            'sujet'=>'sdsdsdsdsd',
            'destinataire' => [
                0 => '1'
            ]

        ]);



    }
    public function testRepartitionController()
    {

        $this->post('/Fermer',['session' => '5']);
        $this->post('/commentaire',['Value' => '1']);
        $this->post('/Start',[
        'contenu'=>'fffffffff',
        'titre'=>'sdsdsdsdsd',
        'debut' => '2017-03-08',
        'fin' => '2017-04-21',
        ]);
        $this->seeInDatabase('sessions', [
            'datedebut' => '2017-03-08',
            'datefin' => '2017-04-21',
        ]);
        $this->post('/reset',['session' => '5']);

    }
    public function testservicecontroller()
    {

       $this->post('/posting',["Data" => ['id' => '4' , 'decision' => 'Rejected']]);
        $this->post('/Check_messages',['session' => '5']);
    }
    public function testuecontroller()
    {

        $this->seeInDatabase('ues', [
            'id' => '5'
        ]);
         $this->post('/DeleteUe',['id' => '5']);$this->visit('/Voeux');
        $this->notSeeInDatabase('ues', [
            'id' => '5'
        ]);
        $this->post('/UpdateFicheUe',[
            'semestre' => '1',
            'codeue' => 'AX203',
            'nbheuresTD' => '100',
            'nbheuresCour' => '100',
            'nbheuresTP' => '100',
            'nbheuresCM' => '100',
            'nbheuresEStage' => '100',
            'nbheuresAFormation' => '100',
            'libellelong' => 'Informatique',
            'groupe' => '2',
            'libellecourt' => 'Informatique',
            'composante' => 'Informatique',
            'departement' => 'Informatique',
            'id' => '21',
            'commentaire'=>'Hello',


        ]);
        $this->seeInDatabase('ues', [
            'codeue' => 'AX203'
        ]);
        $this->post('/ajouterUe',[
            'semestre' => '1',
            'codeue' => 'AX203',
            'nbheuresTD' => '100',
            'nbheuresCour' => '100',
            'nbheuresTP' => '100',
            'nbheuresCM' => '100',
            'nbheuresEStage' => '100',
            'nbheuresAFormation' => '100',
            'libellelong' => 'Informatique',
            'groupe' => '2',
            'libellecourt' => 'Informatique',
            'composante' => 'Informatique',
            'departement' => 'Informatique',

        ]);
        $this->seeInDatabase('ues', [
            'codeue' => 'AX203'
        ]);
    }
    public function testprofilController()
    {
        $this->post('/password',['current-password' => '0000','password'=>'0000','password_confirmation'=>'0000']);

    }
    public function testpersoController()
    {
        $this->post('/ajouterEns',[
        'nom'=>'Test',
        'HTDstat'=>'100',
        'HTDdues'=>'100',
        'HTDattrib'=>'100',
        'delta'=>'100',
        'PRP'=>'100',
        'departement'=>'Informatique',
        'composante'=>'Informatique',
        'corps'=>'Informatique',
        'type'=>'chargé de td',
        'email'=>'test@gmail.com',

    ]);
    $this->seeInDatabase('enseignants', [
        'nom' => 'Test'
    ]);

        $this->post('/UpdateFichePerso',[
        'nom'=>'Test2',
        'HTDstat'=>'100',
        'HTDdues'=>'100',
        'HTDattrib'=>'100',
        'delta'=>'100',
        'PRP'=>'100',
        'departement'=>'Informatique',
        'composante'=>'Informatique',
        'corps'=>'Informatique',
        'type'=>'chargé de td',
        'id'=>'3',
        'commentaire'=>'Hello'

    ]);
        $this->seeInDatabase('enseignants', [
        'nom' => 'Test2'
    ]);

    }


}