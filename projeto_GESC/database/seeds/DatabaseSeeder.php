<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    }
    
}

class EscolaTableSeeder extends Seeder{
    public function run(){
        
$escolas = [
    'Colégio Estadual 31 de Março',
    'Colégio Estadual Alberto Rebello Valente',
    'Colégio Estadual Professor Amálio Pinheiro',
    'Colégio Estadual Ana Divanir Borato',
    'Colégio Estadual General Antônio Sampaio',
    'Colégio Estadual Padre Arnaldo Jansen',
    'Colégio Agrícola Estadual Augusto Ribas',
    'Colégio Estadual Professor Becker E Silva',
    'Colégio Estadual Maestro Bento Mussurunga',
    'Escola Estadual do Campo Brasílio Antunes da Silva',
    'Colégio Estadual Padre Carlos Zelesny',
    'Centro Estadual de Educação Básica de Jovens e Adultos Professor Odair Pasqualini',
    'Centro Estadual de Educação Básica de Jovens e Adultos Professor Paschoal Salles Rosa',
    'Centro Estadual de Educação Básica de Jovens e Adultos da Universidade Estadual de Ponta Grossa',
    'Centro Estadual de Educação Profissional de Ponta Grossa',
    'Colégio Estadual Professor Colares',
    'Colégio Estadual Colônia Dona Luiza',
    'Colégio Estadual Senador Correia',
    'Escola Estadual do Campo de Vila Velha',
    'Colégio Estadual Dorah Gomes Daitschman',
    'Colégio Estadual Frei Doroteu de Pádua',
    'Colégio Estadual Professor Edison Pietrobelli',
    'Colégio Estadual Professora Elzira Correia de Sá',
    'Colégio Estadual Doutor Epaminondas Novaes Ribas',
    'Escola Modalidade Educação Especial Esperança',
    'Colégio Estadual Espírito Santo',
    'Colégio Estadual Professor Eugênio Malanski',
    'Colégio Estadual Francisco Pires Machado',
    'Centro Pontagrossense de Reabilitação Auditiva e da Fala Geny de Jesus S Ribas',
    'Colégio Estadual Professora Hália Terezinha Gruba',
    'Instituto de Educação Professor Cesár Prieto Martinez',
    'Instituição Educação Especial Nova Visão',
    'Instituição Especial Professora Raquel S M',
    'Escola Estadual Professor Iolando Taques Fonseca',
    'Escola Estadual Jesus Divino Operário',
    'Colégio Estadual Professor João Ricardo Von Borell du Vernay',
    'Colégio Estadual José Elias da Rocha',
    'Colégio Estadual Professor José Gomes do Amaral',
    'Colégio Estadual Professor Júlio Teodorico',
    'Colégio Estadual Presidente Kennedy',
    'Colégio Estadual Professora Linda Salamuni Bacila',
    'Colégio Estadual Professora Margarete Márcia Mazur',
    'Escola Modalidade Educação Especial Professora Maria de Lourdes Canziani',
    'Escola Modalidade Educação Especial Maria Dolores',
    'Escola Estadual Medalha Milagrosa',
    'Colégio Estadual Professor Meneleu de Almeida Torres',
    'Escola Estadual Monteiro Lobato',
    'Colégio Estadual do Campo Doutor Munhoz da Rocha',
    'Escola Modalidade Educação Especial Noly Zander',
    'Colégio Estadual Nossa Senhora da Glória',
    'Colégio Estadual Nossa Senhora das Graças',
    'Colégio Estadual General Osório',
    'Colégio Estadual Padre Pedro Grzelczaki',
    'Colégio Estadual Polivalente',
    'Colégio Estadual Regente Feijó',
    'Escola Modalidade Educação Especial Professora Rosa Maria Bueno',
    'Colégio Estadual Santa Maria',
    'Colégio Estadual Professora Sirley Jagas',
    'Escola Modalidade Educação Especial Zilda Arns'
];
    
    
        foreach($escolas as $escola){
            
        
            DB::insert('insert into escolas(nomeescola) values(?)', array($escola));
        }
    }
}
