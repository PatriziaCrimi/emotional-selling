<?php

  // Roles ID
  $admin = 1;
  $sede = 2;
  $dm = 3;
  $dm_junior = 4;
  $osservatore = 5;
  $medico = 6;
  $isf = 7;

  // Teams ID
  $arcoxia = 1;
  $fosavance = 2;
  $gentalyn = 3;
  $gent_beta = 4;
  $elocon = 5;
  $singulair = 6;
  $nasonex = 7;
  $aerius = 8;
  $maxalt = 9;
  $lortaan = 10;
  $inegy = 11;
  $ezetrol = 12;
  $hyzaar = 13;
  $forzaar = 14;
  $enafren = 15;
  $vasoretic = 16;
  $sinvacor = 17;
  $propecia = 18;

  return [

    // ############################ PLAYERS ############################

    // ------------------- Round 1 -------------------

    // -------- Gruppo 1 --------

    // ISF
    [
      "user_id" => 30,  // Cuccunato
      "group_id" => 1,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $arcoxia  // Team 1
    ],
    [
      "user_id" => 6, // Ioannucci
      "group_id" => 1,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $arcoxia  // Team 1
    ],
    [
      "user_id" => 49,  // Del Curto
      "group_id" => 1,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $arcoxia  // Team 1
    ],
    [
      "user_id" => 3, // Chiozzi
      "group_id" => 1,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $arcoxia  // Team 1
    ],
    [
      "user_id" => 79,  // Costa
      "group_id" => 1,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $arcoxia  // Team 1
    ],

    // Medico
    [
      "user_id" => 74,  // De Matteo
      "group_id" => 1,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $fosavance  // Team 2
    ],
    [
      "user_id" => 39,  // Di Pancrazio
      "group_id" => 1,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $fosavance  // Team 2
    ],
    [
      "user_id" => 57,  // Tuninetti
      "group_id" => 1,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $fosavance  // Team 2
    ],
    [
      "user_id" => 82,  // Macculi
      "group_id" => 1,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $fosavance  // Team 2
    ],
    [
      "user_id" => 72,  // Caragiulo
      "group_id" => 1,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $fosavance  // Team 2
    ],

    // Osservatore
    [
      "user_id" => 44,  // Lucchesi
      "group_id" => 1,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $gentalyn  // Team 3
    ],
    [
      "user_id" => 70,  // Barranca
      "group_id" => 1,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $gentalyn  // Team 3
    ],
    [
      "user_id" => 69,  // Angileri
      "group_id" => 1,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $gentalyn  // Team 3
    ],
    [
      "user_id" => 10,  // Califano
      "group_id" => 1,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $gentalyn  // Team 3
    ],
    [
      "user_id" => 80,  // Di Giorgio
      "group_id" => 1,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $gentalyn  // Team 3
    ],

    //  -------- Gruppo 2 --------

    // ISF
    [
      "user_id" => 51,  // Furlan
      "group_id" => 2,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $gent_beta  // Team 4
    ],
    [
      "user_id" => 65,  // Pirovano
      "group_id" => 2,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $gent_beta  // Team 4
    ],
    [
      "user_id" => 81,  // Lusa
      "group_id" => 2,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $gent_beta  // Team 4
    ],
    [
      "user_id" => 54,  // Raviolo
      "group_id" => 2,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $gent_beta  // Team 4
    ],
    [
      "user_id" => 55,  // Rizzi
      "group_id" => 2,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $gent_beta  // Team 4
    ],

    // Medico
    [
      "user_id" => 4, // De Cristoforo
      "group_id" => 2,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $elocon  // Team 5
    ],
    [
      "user_id" => 63,  // Franzosi
      "group_id" => 2,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $elocon  // Team 5
    ],
    [
      "user_id" => 16,  // Occhicone
      "group_id" => 2,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $elocon  // Team 5
    ],
    [
      "user_id" => 78,  // Busato
      "group_id" => 2,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $elocon  // Team 5
    ],
    [
      "user_id" => 83,  // Nuzzo
      "group_id" => 2,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $elocon  // Team 5
    ],

    // Osservatore
    [
      "user_id" => 14,  // Dursi
      "group_id" => 2,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $singulair  // Team 6
    ],
    [
      "user_id" => 33,  // Magro
      "group_id" => 2,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $singulair  // Team 6
    ],
    [
      "user_id" => 2, // Carlotti
      "group_id" => 2,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $singulair  // Team 6
    ],
    [
      "user_id" => 8, // Ngantcha
      "group_id" => 2,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $singulair  // Team 6
    ],
    [
      "user_id" => 24,  // De Falco
      "group_id" => 2,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $singulair  // Team 6
    ],

    //  -------- Gruppo 3 --------

    // ISF
    [
      "user_id" => 45,  // Masoni
      "group_id" => 3,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $nasonex  // Team 7
    ],
    [
      "user_id" => 53,  // Pellizzeri
      "group_id" => 3,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $nasonex  // Team 7
    ],
    [
      "user_id" => 15,  // Lo Parco
      "group_id" => 3,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $nasonex  // Team 7
    ],
    [
      "user_id" => 76,  // Messina
      "group_id" => 3,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $nasonex  // Team 7
    ],

    // Medico
    [
      "user_id" => 17,  // Piro
      "group_id" => 3,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $aerius  // Team 8
    ],
    [
      "user_id" => 43,  // Gherardini
      "group_id" => 3,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $aerius  // Team 8
    ],
    [
      "user_id" => 11,  // Capocasale
      "group_id" => 3,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $aerius  // Team 8
    ],
    [
      "user_id" => 18,  // Santorelli
      "group_id" => 3,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $aerius  // Team 8
    ],
    [
      "user_id" => 87,  // Zanon
      "group_id" => 3,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $aerius  // Team 8
    ],

    // Osservatore
    [
      "user_id" => 19,  // Ventriglia
      "group_id" => 3,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $maxalt  // Team 9
    ],
    [
      "user_id" => 86,  // Visentin
      "group_id" => 3,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $maxalt  // Team 9
    ],
    [
      "user_id" => 27,  // Iodice
      "group_id" => 3,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $maxalt  // Team 9
    ],

    //  -------- Gruppo 4 --------

    // ISF
    [
      "user_id" => 29,  // Viola
      "group_id" => 4,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $lortaan  // Team 10
    ],
    [
      "user_id" => 34,  // Piazza
      "group_id" => 4,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $lortaan  // Team 10
    ],
    [
      "user_id" => 58,  // Bellasio
      "group_id" => 4,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $lortaan  // Team 10
    ],
    [
      "user_id" => 1, // Angelicchio
      "group_id" => 4,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $lortaan  // Team 10
    ],
    [
      "user_id" => 12,  // Carafa
      "group_id" => 4,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $lortaan  // Team 10
    ],

    // Medico
    [
      "user_id" => 23,  // Carangelo
      "group_id" => 4,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $inegy  // Team 11
    ],
    [
      "user_id" => 38,  // Barsuglia
      "group_id" => 4,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $inegy  // Team 11
    ],
    [
      "user_id" => 22,  // Biondi
      "group_id" => 4,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $inegy  // Team 11
    ],
    [
      "user_id" => 47,  // Banzato
      "group_id" => 4,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $inegy  // Team 11
    ],
    [
      "user_id" => 50,  // Di Maria
      "group_id" => 4,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $inegy  // Team 11
    ],

    // Osservatore
    [
      "user_id" => 13,  // Cucciniello
      "group_id" => 4,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $ezetrol  // Team 12
    ],
    [
      "user_id" => 5, // Gasparetti
      "group_id" => 4,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $ezetrol  // Team 12
    ],
    [
      "user_id" => 48, // Beni
      "group_id" => 4,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $ezetrol  // Team 12
    ],
    [
      "user_id" => 42, // Freschi
      "group_id" => 4,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $ezetrol  // Team 12
    ],
    [
      "user_id" => 67,  // Rosa
      "group_id" => 4,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $ezetrol  // Team 12
    ],

    //  -------- Gruppo 5 --------

    // ISF
    [
      "user_id" => 46,  // Peretti
      "group_id" => 5,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $hyzaar  // Team 13
    ],
    [
      "user_id" => 35,  // Pirrone
      "group_id" => 5,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $hyzaar  // Team 13
    ],
    [
      "user_id" => 28,  // Sorvillo
      "group_id" => 5,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $hyzaar  // Team 13
    ],
    [
      "user_id" => 75,  // Loreno
      "group_id" => 5,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $hyzaar  // Team 13
    ],
    [
      "user_id" => 77,  // Battaini
      "group_id" => 5,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $hyzaar  // Team 13
    ],

    // Medico
    [
      "user_id" => 37,  // Severino
      "group_id" => 5,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $forzaar  // Team 14
    ],
    [
      "user_id" => 68,  // Zoboli
      "group_id" => 5,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $forzaar  // Team 14
    ],
    [
      "user_id" => 60,  // Bonfante
      "group_id" => 5,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $forzaar  // Team 14
    ],
    [
      "user_id" => 62,  // Ciaccia
      "group_id" => 5,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $forzaar  // Team 14
    ],
    [
      "user_id" => 66,  // Pruneri
      "group_id" => 5,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $forzaar  // Team 14
    ],

    // Osservatore
    [
      "user_id" => 26,  // Franceschini
      "group_id" => 5,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $enafren  // Team 15
    ],
    [
      "user_id" => 25,  // De Felice
      "group_id" => 5,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $enafren  // Team 15
    ],
    [
      "user_id" => 59,  // Bertolini
      "group_id" => 5,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $enafren  // Team 15
    ],
    [
      "user_id" => 9, // Panzavolta
      "group_id" => 5,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $enafren  // Team 15
    ],
    [
      "user_id" => 40,  // Emili
      "group_id" => 5,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $enafren  // Team 15
    ],

    //  -------- Gruppo 6 --------

    // ISF
    [
      "user_id" => 41,  // Fasanelli
      "group_id" => 6,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $vasoretic  // Team 16
    ],
    [
      "user_id" => 21,  // Battistini
      "group_id" => 6,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $vasoretic  // Team 16
    ],
    [
      "user_id" => 52,  // Gambetta
      "group_id" => 6,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $vasoretic  // Team 16
    ],
    [
      "user_id" => 84,  // Prisco
      "group_id" => 6,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $vasoretic  // Team 16
    ],
    [
      "user_id" => 56,  // Rizzo Vincenzo (Player)
      "group_id" => 6,
      "role_id" => $isf,
      "round_id" => 1,
      "team_id" => $vasoretic  // Team 16
    ],

    // Medico
    [
      "user_id" => 61,  // Campanozzi
      "group_id" => 6,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $sinvacor  // Team 17
    ],
    [
      "user_id" => 32,  // Giunta
      "group_id" => 6,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $sinvacor  // Team 17
    ],
    [
      "user_id" => 7, // Mancinelli
      "group_id" => 6,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $sinvacor  // Team 17
    ],
    [
      "user_id" => 73,  // Cocorullo
      "group_id" => 6,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $sinvacor  // Team 17
    ],
    [
      "user_id" => 64,  // Marchiani
      "group_id" => 6,
      "role_id" => $medico,
      "round_id" => 1,
      "team_id" => $sinvacor  // Team 17
    ],

    // Osservatore
    [
      "user_id" => 85,  // Soramel
      "group_id" => 6,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $propecia  // Team 18
    ],
    [
      "user_id" => 36,  // Scotto
      "group_id" => 6,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $propecia  // Team 18
    ],
    [
      "user_id" => 71,  // Brattina
      "group_id" => 6,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $propecia  // Team 18
    ],
    [
      "user_id" => 31,  // Finocchiaro
      "group_id" => 6,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $propecia  // Team 18
    ],
    [
      "user_id" => 20,  // Bartoli
      "group_id" => 6,
      "role_id" => $osservatore,
      "round_id" => 1,
      "team_id" => $propecia  // Team 18
    ],

    // ------------------- Round 2 -------------------

    //  -------- Gruppo 1 --------

    // ISF
    [
      "user_id" => 26,  // Franceschini
      "group_id" => 1,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $enafren  // Team 15

    ],
    [
      "user_id" => 25,  // De Felice
      "group_id" => 1,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $enafren  // Team 15
    ],
    [
      "user_id" => 59,  // Bertolini
      "group_id" => 1,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $enafren  // Team 15
    ],
    [
      "user_id" => 9, // Panzavolta
      "group_id" => 1,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $enafren  // Team 15
    ],
    [
      "user_id" => 40,  // Emili
      "group_id" => 1,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $enafren  // Team 15
    ],

    // Medico
    [
      "user_id" => 30,  // Cuccunato
      "group_id" => 1,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $arcoxia  // Team 1
    ],
    [
      "user_id" => 6, // Ioannucci
      "group_id" => 1,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $arcoxia  // Team 1
    ],
    [
      "user_id" => 49,  // Del Curto
      "group_id" => 1,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $arcoxia  // Team 1
    ],
    [
      "user_id" => 3, // Chiozzi
      "group_id" => 1,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $arcoxia  // Team 1
    ],
    [
      "user_id" => 79,  // Costa
      "group_id" => 1,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $arcoxia  // Team 1
    ],

    // Osservatore
    [
      "user_id" => 45,  // Masoni
      "group_id" => 1,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $nasonex  // Team 7
    ],
    [
      "user_id" => 53,  // Pellizzeri
      "group_id" => 1,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $nasonex  // Team 7
    ],
    [
      "user_id" => 15,  // Lo Parco
      "group_id" => 1,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $nasonex  // Team 7
    ],
    [
      "user_id" => 76,  // Messina
      "group_id" => 1,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $nasonex  // Team 7
    ],

    //  -------- Gruppo 2 --------

    // ISF
    [
      "user_id" => 23,  // Carangelo
      "group_id" => 2,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $inegy  // Team 11
    ],
    [
      "user_id" => 38,  // Barsuglia
      "group_id" => 2,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $inegy  // Team 11
    ],
    [
      "user_id" => 22,  // Biondi
      "group_id" => 2,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $inegy  // Team 11
    ],
    [
      "user_id" => 47,  // Banzato
      "group_id" => 2,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $inegy  // Team 11
    ],
    [
      "user_id" => 50,  // Di Maria
      "group_id" => 2,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $inegy  // Team 11
    ],

    // Medico
    [
      "user_id" => 85,  // Soramel
      "group_id" => 2,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $propecia  // Team 18
    ],
    [
      "user_id" => 36,  // Scotto
      "group_id" => 2,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $propecia  // Team 18
    ],
    [
      "user_id" => 71,  // Brattina
      "group_id" => 2,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $propecia  // Team 18
    ],
    [
      "user_id" => 31,  // Finocchiaro
      "group_id" => 2,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $propecia  // Team 18
    ],
    [
      "user_id" => 20,  // Bartoli
      "group_id" => 2,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $propecia  // Team 18
    ],

    // Osservatore
    [
      "user_id" => 4, // De Cristoforo
      "group_id" => 2,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $elocon  // Team 5
    ],
    [
      "user_id" => 63,  // Franzosi
      "group_id" => 2,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $elocon  // Team 5
    ],
    [
      "user_id" => 16,  // Occhicone
      "group_id" => 2,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $elocon  // Team 5
    ],
    [
      "user_id" => 78,  // Busato
      "group_id" => 2,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $elocon  // Team 5
    ],
    [
      "user_id" => 83,  // Nuzzo
      "group_id" => 2,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $elocon  // Team 5
    ],

    //  -------- Gruppo 3 --------

    // ISF
    [
      "user_id" => 17,  // Piro
      "group_id" => 3,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $aerius  // Team 8
    ],
    [
      "user_id" => 43,  // Gherardini
      "group_id" => 3,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $aerius  // Team 8
    ],
    [
      "user_id" => 11,  // Capocasale
      "group_id" => 3,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $aerius  // Team 8
    ],
    [
      "user_id" => 18,  // Santorelli
      "group_id" => 3,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $aerius  // Team 8
    ],
    [
      "user_id" => 87,  // Zanon
      "group_id" => 3,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $aerius  // Team 8
    ],

    // Medico
    [
      "user_id" => 46,  // Peretti
      "group_id" => 3,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $hyzaar  // Team 13
    ],
    [
      "user_id" => 35,  // Pirrone
      "group_id" => 3,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $hyzaar  // Team 13
    ],
    [
      "user_id" => 28,  // Sorvillo
      "group_id" => 3,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $hyzaar  // Team 13
    ],
    [
      "user_id" => 75,  // Loreno
      "group_id" => 3,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $hyzaar  // Team 13
    ],
    [
      "user_id" => 77,  // Battaini
      "group_id" => 3,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $hyzaar  // Team 13
    ],

    // Osservatore
    [
      "user_id" => 74,  // De Matteo
      "group_id" => 3,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $fosavance  // Team 2
    ],
    [
      "user_id" => 39,  // Di Pancrazio
      "group_id" => 3,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $fosavance  // Team 2
    ],
    [
      "user_id" => 57,  // Tuninetti
      "group_id" => 3,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $fosavance  // Team 2
    ],
    [
      "user_id" => 82,  // Macculi
      "group_id" => 3,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $fosavance  // Team 2
    ],
    [
      "user_id" => 72,  // Caragiulo
      "group_id" => 3,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $fosavance  // Team 2
    ],

    //  -------- Gruppo 4 --------

    // ISF
    [
      "user_id" => 13,  // Cucciniello
      "group_id" => 4,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $ezetrol  // Team 12
    ],
    [
      "user_id" => 5, // Gasparetti
      "group_id" => 4,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $ezetrol  // Team 12
    ],
    [
      "user_id" => 48, // Beni
      "group_id" => 4,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $ezetrol  // Team 12
    ],
    [
      "user_id" => 42, // Freschi
      "group_id" => 4,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $ezetrol  // Team 12
    ],
    [
      "user_id" => 67,  // Rosa
      "group_id" => 4,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $ezetrol  // Team 12
    ],

    // Medico
    [
      "user_id" => 51,  // Furlan
      "group_id" => 4,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $gent_beta  // Team 4
    ],
    [
      "user_id" => 65,  // Pirovano
      "group_id" => 4,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $gent_beta  // Team 4
    ],
    [
      "user_id" => 81,  // Lusa
      "group_id" => 4,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $gent_beta  // Team 4
    ],
    [
      "user_id" => 54,  // Raviolo
      "group_id" => 4,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $gent_beta  // Team 4
    ],
    [
      "user_id" => 55,  // Rizzi
      "group_id" => 4,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $gent_beta  // Team 4
    ],

    // Osservatore
    [
      "user_id" => 61,  // Campanozzi
      "group_id" => 4,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $sinvacor  // Team 17
    ],
    [
      "user_id" => 32,  // Giunta
      "group_id" => 4,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $sinvacor  // Team 17
    ],
    [
      "user_id" => 7, // Mancinelli
      "group_id" => 4,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $sinvacor  // Team 17
    ],
    [
      "user_id" => 73,  // Cocorullo
      "group_id" => 4,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $sinvacor  // Team 17
    ],
    [
      "user_id" => 64,  // Marchiani
      "group_id" => 4,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $sinvacor  // Team 17
    ],

    //  -------- Gruppo 5 --------

    // ISF
    [
      "user_id" => 44,  // Lucchesi
      "group_id" => 5,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $gentalyn  // Team 3
    ],
    [
      "user_id" => 70,  // Barranca
      "group_id" => 5,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $gentalyn  // Team 3
    ],
    [
      "user_id" => 69,  // Angileri
      "group_id" => 5,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $gentalyn  // Team 3
    ],
    [
      "user_id" => 10,  // Califano
      "group_id" => 5,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $gentalyn  // Team 3
    ],
    [
      "user_id" => 80,  // Di Giorgio
      "group_id" => 5,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $gentalyn  // Team 3
    ],

    // Medico
    [
      "user_id" => 19,  // Ventriglia
      "group_id" => 5,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $maxalt  // Team 9
    ],
    [
      "user_id" => 86,  // Visentin
      "group_id" => 5,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $maxalt  // Team 9
    ],
    [
      "user_id" => 27,  // Iodice
      "group_id" => 5,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $maxalt  // Team 9
    ],

    // Osservatore
    [
      "user_id" => 37,  // Severino
      "group_id" => 5,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $forzaar  // Team 14
    ],
    [
      "user_id" => 68,  // Zoboli
      "group_id" => 5,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $forzaar  // Team 14
    ],
    [
      "user_id" => 60,  // Bonfante
      "group_id" => 5,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $forzaar  // Team 14
    ],
    [
      "user_id" => 62,  // Ciaccia
      "group_id" => 5,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $forzaar  // Team 14
    ],
    [
      "user_id" => 66,  // Pruneri
      "group_id" => 5,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $forzaar  // Team 14
    ],

    //  -------- Gruppo 6 --------

    // ISF
    [
      "user_id" => 14,  // Dursi
      "group_id" => 6,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $singulair  // Team 6
    ],
    [
      "user_id" => 33,  // Magro
      "group_id" => 6,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $singulair  // Team 6
    ],
    [
      "user_id" => 2, // Carlotti
      "group_id" => 6,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $singulair  // Team 6
    ],
    [
      "user_id" => 8, // Ngantcha
      "group_id" => 6,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $singulair  // Team 6
    ],
    [
      "user_id" => 24,  // De Falco
      "group_id" => 6,
      "role_id" => $isf,
      "round_id" => 2,
      "team_id" => $singulair  // Team 6
    ],

    // Medico
    [
      "user_id" => 29,  // Viola
      "group_id" => 6,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $lortaan  // Team 10
    ],
    [
      "user_id" => 34,  // Piazza
      "group_id" => 6,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $lortaan  // Team 10
    ],
    [
      "user_id" => 58,  // Bellasio
      "group_id" => 6,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $lortaan  // Team 10
    ],
    [
      "user_id" => 1, // Angelicchio
      "group_id" => 6,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $lortaan  // Team 10
    ],
    [
      "user_id" => 12,  // Carafa
      "group_id" => 6,
      "role_id" => $medico,
      "round_id" => 2,
      "team_id" => $lortaan  // Team 10
    ],

    // Osservatore
    [
      "user_id" => 41,  // Fasanelli
      "group_id" => 6,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $vasoretic  // Team 16
    ],
    [
      "user_id" => 21,  // Battistini
      "group_id" => 6,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $vasoretic  // Team 16
    ],
    [
      "user_id" => 52,  // Gambetta
      "group_id" => 6,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $vasoretic  // Team 16
    ],
    [
      "user_id" => 84,  // Prisco
      "group_id" => 6,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $vasoretic  // Team 16
    ],
    [
      "user_id" => 56,  // Rizzo Vincenzo (Player)
      "group_id" => 6,
      "role_id" => $osservatore,
      "round_id" => 2,
      "team_id" => $vasoretic  // Team 16
    ],

    // ------------------- Round 3 -------------------

    //  -------- Gruppo 1 --------

    // ISF
    [
      "user_id" => 19,  // Ventriglia
      "group_id" => 1,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $maxalt  // Team 9
    ],
    [
      "user_id" => 86,  // Visentin
      "group_id" => 1,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $maxalt  // Team 9
    ],
    [
      "user_id" => 27,  // Iodice
      "group_id" => 1,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $maxalt  // Team 9
    ],

    // Medico
    [
      "user_id" => 26,  // Franceschini
      "group_id" => 1,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $enafren  // Team 15
    ],
    [
      "user_id" => 25,  // De Felice
      "group_id" => 1,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $enafren  // Team 15
    ],
    [
      "user_id" => 59,  // Bertolini
      "group_id" => 1,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $enafren  // Team 15
    ],
    [
      "user_id" => 9, // Panzavolta
      "group_id" => 1,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $enafren  // Team 15
    ],
    [
      "user_id" => 40,  // Emili
      "group_id" => 1,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $enafren  // Team 15
    ],

    // Osservatore
    [
      "user_id" => 30,  // Cuccunato
      "group_id" => 1,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $arcoxia  // Team 1
    ],
    [
      "user_id" => 6, // Ioannucci
      "group_id" => 1,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $arcoxia  // Team 1
    ],
    [
      "user_id" => 49,  // Del Curto
      "group_id" => 1,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $arcoxia  // Team 1
    ],
    [
      "user_id" => 3, // Chiozzi
      "group_id" => 1,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $arcoxia  // Team 1
    ],
    [
      "user_id" => 79,  // Costa
      "group_id" => 1,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $arcoxia  // Team 1
    ],

    //  -------- Gruppo 2 --------

    // ISF
    [
      "user_id" => 61,  // Campanozzi
      "group_id" => 2,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $sinvacor  // Team 17
    ],
    [
      "user_id" => 32,  // Giunta
      "group_id" => 2,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $sinvacor  // Team 17
    ],
    [
      "user_id" => 7, // Mancinelli
      "group_id" => 2,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $sinvacor  // Team 17
    ],
    [
      "user_id" => 73,  // Cocorullo
      "group_id" => 2,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $sinvacor  // Team 17
    ],
    [
      "user_id" => 64,  // Marchiani
      "group_id" => 2,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $sinvacor  // Team 17
    ],

    // Medico
    [
      "user_id" => 14,  // Dursi
      "group_id" => 2,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $singulair  // Team 6
    ],
    [
      "user_id" => 33,  // Magro
      "group_id" => 2,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $singulair  // Team 6
    ],
    [
      "user_id" => 2, // Carlotti
      "group_id" => 2,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $singulair  // Team 6
    ],
    [
      "user_id" => 8, // Ngantcha
      "group_id" => 2,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $singulair  // Team 6
    ],
    [
      "user_id" => 24,  // De Falco
      "group_id" => 2,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $singulair  // Team 6
    ],

    // Osservatore
    [
      "user_id" => 23,  // Carangelo
      "group_id" => 2,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $inegy  // Team 11
    ],
    [
      "user_id" => 38,  // Barsuglia
      "group_id" => 2,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $inegy  // Team 11
    ],
    [
      "user_id" => 22,  // Biondi
      "group_id" => 2,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $inegy  // Team 11
    ],
    [
      "user_id" => 47,  // Banzato
      "group_id" => 2,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $inegy  // Team 11
    ],
    [
      "user_id" => 50,  // Di Maria
      "group_id" => 2,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $inegy  // Team 11
    ],

    //  -------- Gruppo 3 --------

    // ISF
    [
      "user_id" => 37,  // Severino
      "group_id" => 3,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $forzaar  // Team 14
    ],
    [
      "user_id" => 68,  // Zoboli
      "group_id" => 3,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $forzaar  // Team 14
    ],
    [
      "user_id" => 60,  // Bonfante
      "group_id" => 3,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $forzaar  // Team 14
    ],
    [
      "user_id" => 62,  // Ciaccia
      "group_id" => 3,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $forzaar  // Team 14
    ],
    [
      "user_id" => 66,  // Pruneri
      "group_id" => 3,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $forzaar  // Team 14
    ],

    // Medico
    [
      "user_id" => 44,  // Lucchesi
      "group_id" => 3,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $gentalyn  // Team 3
    ],
    [
      "user_id" => 70,  // Barranca
      "group_id" => 3,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $gentalyn  // Team 3
    ],
    [
      "user_id" => 69,  // Angileri
      "group_id" => 3,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $gentalyn  // Team 3
    ],
    [
      "user_id" => 10,  // Califano
      "group_id" => 3,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $gentalyn  // Team 3
    ],
    [
      "user_id" => 80,  // Di Giorgio
      "group_id" => 3,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $gentalyn  // Team 3
    ],

    // Osservatore
    [
      "user_id" => 17,  // Piro
      "group_id" => 3,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $aerius  // Team 8
    ],
    [
      "user_id" => 43,  // Gherardini
      "group_id" => 3,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $aerius  // Team 8
    ],
    [
      "user_id" => 11,  // Capocasale
      "group_id" => 3,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $aerius  // Team 8
    ],
    [
      "user_id" => 18,  // Santorelli
      "group_id" => 3,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $aerius  // Team 8
    ],
    [
      "user_id" => 87,  // Zanon
      "group_id" => 3,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $aerius  // Team 8
    ],

    //  -------- Gruppo 4 --------

    // ISF
    [
      "user_id" => 4, // De Cristoforo
      "group_id" => 4,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $elocon  // Team 5
    ],
    [
      "user_id" => 63,  // Franzosi
      "group_id" => 4,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $elocon  // Team 5
    ],
    [
      "user_id" => 16,  // Occhicone
      "group_id" => 4,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $elocon  // Team 5
    ],
    [
      "user_id" => 78,  // Busato
      "group_id" => 4,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $elocon  // Team 5
    ],
    [
      "user_id" => 83,  // Nuzzo
      "group_id" => 4,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $elocon  // Team 5
    ],

    // Medico
    [
      "user_id" => 13,  // Cucciniello
      "group_id" => 4,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $ezetrol  // Team 12
    ],
    [
      "user_id" => 5, // Gasparetti
      "group_id" => 4,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $ezetrol  // Team 12
    ],
    [
      "user_id" => 48, // Beni
      "group_id" => 4,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $ezetrol  // Team 12
    ],
    [
      "user_id" => 42, // Freschi
      "group_id" => 4,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $ezetrol  // Team 12
    ],
    [
      "user_id" => 67,  // Rosa
      "group_id" => 4,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $ezetrol  // Team 12
    ],

    // Osservatore
    [
      "user_id" => 29,  // Viola
      "group_id" => 4,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $lortaan  // Team 10
    ],
    [
      "user_id" => 34,  // Piazza
      "group_id" => 4,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $lortaan  // Team 10
    ],
    [
      "user_id" => 58,  // Bellasio
      "group_id" => 4,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $lortaan  // Team 10
    ],
    [
      "user_id" => 1, // Angelicchio
      "group_id" => 4,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $lortaan  // Team 10
    ],
    [
      "user_id" => 12,  // Carafa
      "group_id" => 4,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $lortaan  // Team 10
    ],

    //  -------- Gruppo 5 --------

    // ISF
    [
      "user_id" => 74,  // De Matteo
      "group_id" => 5,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $fosavance  // Team 2
    ],
    [
      "user_id" => 39,  // Di Pancrazio
      "group_id" => 5,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $fosavance  // Team 2
    ],
    [
      "user_id" => 57,  // Tuninetti
      "group_id" => 5,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $fosavance  // Team 2
    ],
    [
      "user_id" => 82,  // Macculi
      "group_id" => 5,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $fosavance  // Team 2
    ],
    [
      "user_id" => 72,  // Caragiulo
      "group_id" => 5,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $fosavance  // Team 2
    ],

    // Medico
    [
      "user_id" => 45,  // Masoni
      "group_id" => 5,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $nasonex  // Team 7
    ],
    [
      "user_id" => 53,  // Pellizzeri
      "group_id" => 5,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $nasonex  // Team 7
    ],
    [
      "user_id" => 15,  // Lo Parco
      "group_id" => 5,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $nasonex  // Team 7
    ],
    [
      "user_id" => 76,  // Messina
      "group_id" => 5,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $nasonex  // Team 7
    ],

    // Osservatore
    [
      "user_id" => 46,  // Peretti
      "group_id" => 5,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $hyzaar  // Team 13
    ],
    [
      "user_id" => 35,  // Pirrone
      "group_id" => 5,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $hyzaar  // Team 13
    ],
    [
      "user_id" => 28,  // Sorvillo
      "group_id" => 5,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $hyzaar  // Team 13
    ],
    [
      "user_id" => 75,  // Loreno
      "group_id" => 5,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $hyzaar  // Team 13
    ],
    [
      "user_id" => 77,  // Battaini
      "group_id" => 5,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $hyzaar  // Team 13
    ],

    //  -------- Gruppo 6 --------

    // ISF
    [
      "user_id" => 85,  // Soramel
      "group_id" => 6,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $propecia  // Team 18
    ],
    [
      "user_id" => 36,  // Scotto
      "group_id" => 6,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $propecia  // Team 18
    ],
    [
      "user_id" => 71,  // Brattina
      "group_id" => 6,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $propecia  // Team 18
    ],
    [
      "user_id" => 31,  // Finocchiaro
      "group_id" => 6,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $propecia  // Team 18
    ],
    [
      "user_id" => 20,  // Bartoli
      "group_id" => 6,
      "role_id" => $isf,
      "round_id" => 3,
      "team_id" => $propecia  // Team 18
    ],

    // Medico
    [
      "user_id" => 41,  // Fasanelli
      "group_id" => 6,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $vasoretic  // Team 16
    ],
    [
      "user_id" => 21,  // Battistini
      "group_id" => 6,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $vasoretic  // Team 16
    ],
    [
      "user_id" => 52,  // Gambetta
      "group_id" => 6,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $vasoretic  // Team 16
    ],
    [
      "user_id" => 84,  // Prisco
      "group_id" => 6,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $vasoretic  // Team 16
    ],
    [
      "user_id" => 56,  // Rizzo Vincenzo (Player)
      "group_id" => 6,
      "role_id" => $medico,
      "round_id" => 3,
      "team_id" => $vasoretic  // Team 16
    ],

    // Osservatore
    [
      "user_id" => 51,  // Furlan
      "group_id" => 6,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $gent_beta  // Team 4
    ],
    [
      "user_id" => 65,  // Pirovano
      "group_id" => 6,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $gent_beta  // Team 4
    ],
    [
      "user_id" => 81,  // Lusa
      "group_id" => 6,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $gent_beta  // Team 4
    ],
    [
      "user_id" => 54,  // Raviolo
      "group_id" => 6,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $gent_beta  // Team 4
    ],
    [
      "user_id" => 55,  // Rizzi
      "group_id" => 6,
      "role_id" => $osservatore,
      "round_id" => 3,
      "team_id" => $gent_beta  // Team 4
    ],

    // ############################ DM ############################

    // ------------------- Round 1 -------------------

    [
      "user_id" => 88,  // Cariati
      "group_id" => 4,
      "role_id" => $dm,
      "round_id" => 1,
      "team_id" => null
    ],
    [
      "user_id" => 89,  // Marino
      "group_id" => 5,
      "role_id" => $dm,
      "round_id" => 1,
      "team_id" => null
    ],
    [
      "user_id" => 90,  // Sinicato
      "group_id" => 1,
      "role_id" => $dm,
      "round_id" => 1,
      "team_id" => null
    ],
    [
      "user_id" => 91,  // Carapellucci
      "group_id" => 3,
      "role_id" => $dm_junior,
      "round_id" => 1,
      "team_id" => null
    ],
    [
      "user_id" => 92,  // Leone
      "group_id" => 2,
      "role_id" => $dm,
      "round_id" => 1,
      "team_id" => null
    ],
    [
      "user_id" => 93,  // Pittaluga
      "group_id" => 6,
      "role_id" => $dm,
      "round_id" => 1,
      "team_id" => null
    ],
    [
      "user_id" => 94,  // Polidori
      "group_id" => 2,
      "role_id" => $dm_junior,
      "round_id" => 1,
      "team_id" => null
    ],
    [
      "user_id" => 95,  // Ebraico
      "group_id" => 3,
      "role_id" => $dm,
      "round_id" => 1,
      "team_id" => null
    ],
    [
      "user_id" => 96,  // Rizzo Salvatore (DM)
      "group_id" => 1,
      "role_id" => $dm_junior,
      "round_id" => 1,
      "team_id" => null
    ],

    // ############################ DM ############################

    // ------------------- Round 2 -------------------
    [
      "user_id" => 88,  // Cariati
      "group_id" => 4,
      "role_id" => $dm,
      "round_id" => 2,
      "team_id" => null
    ],
    [
      "user_id" => 89,  // Marino
      "group_id" => 5,
      "role_id" => $dm,
      "round_id" => 2,
      "team_id" => null
    ],
    [
      "user_id" => 90,  // Sinicato
      "group_id" => 1,
      "role_id" => $dm,
      "round_id" => 2,
      "team_id" => null
    ],
    [
      "user_id" => 91,  // Carapellucci
      "group_id" => 3,
      "role_id" => $dm_junior,
      "round_id" => 2,
      "team_id" => null
    ],
    [
      "user_id" => 92,  // Leone
      "group_id" => 2,
      "role_id" => $dm,
      "round_id" => 2,
      "team_id" => null
    ],
    [
      "user_id" => 93,  // Pittaluga
      "group_id" => 6,
      "role_id" => $dm,
      "round_id" => 2,
      "team_id" => null
    ],
    [
      "user_id" => 94,  // Polidori
      "group_id" => 2,
      "role_id" => $dm_junior,
      "round_id" => 2,
      "team_id" => null
    ],
    [
      "user_id" => 95,  // Ebraico
      "group_id" => 3,
      "role_id" => $dm,
      "round_id" => 2,
      "team_id" => null
    ],
    [
      "user_id" => 96,  // Rizzo Salvatore (DM)
      "group_id" => 1,
      "role_id" => $dm_junior,
      "round_id" => 2,
      "team_id" => null
    ],

    // ############################ DM ############################

    // ------------------- Round 3 -------------------
    [
      "user_id" => 88,  // Cariati
      "group_id" => 4,
      "role_id" => $dm,
      "round_id" => 3,
      "team_id" => null
    ],
    [
      "user_id" => 89,  // Marino
      "group_id" => 5,
      "role_id" => $dm,
      "round_id" => 3,
      "team_id" => null
    ],
    [
      "user_id" => 90,  // Sinicato
      "group_id" => 1,
      "role_id" => $dm,
      "round_id" => 3,
      "team_id" => null
    ],
    [
      "user_id" => 91,  // Carapellucci
      "group_id" => 3,
      "role_id" => $dm_junior,
      "round_id" => 3,
      "team_id" => null
    ],
    [
      "user_id" => 92,  // Leone
      "group_id" => 2,
      "role_id" => $dm,
      "round_id" => 3,
      "team_id" => null
    ],
    [
      "user_id" => 93,  // Pittaluga
      "group_id" => 6,
      "role_id" => $dm,
      "round_id" => 3,
      "team_id" => null
    ],
    [
      "user_id" => 94,  // Polidori
      "group_id" => 2,
      "role_id" => $dm_junior,
      "round_id" => 3,
      "team_id" => null
    ],
    [
      "user_id" => 95,  // Ebraico
      "group_id" => 3,
      "role_id" => $dm,
      "round_id" => 3,
      "team_id" => null
    ],
    [
      "user_id" => 96,  // Rizzo Salvatore (DM)
      "group_id" => 1,
      "role_id" => $dm_junior,
      "round_id" => 3,
      "team_id" => null
    ],


    // ############################ SEDE ############################

    // ------------------- Round 1 -------------------
    [
      "user_id" => 97,  // Michela Aucello
      "group_id" => null,
      "role_id" => $sede,
      "round_id" => 1,
      "team_id" => null
    ],
    [
      "user_id" => 98,  // Federico Silvagni
      "group_id" => null,
      "role_id" => $sede,
      "round_id" => 1,
      "team_id" => null
    ],
    [
      "user_id" => 99,  // Loredana Orsini
      "group_id" => null,
      "role_id" => $sede,
      "round_id" => 1,
      "team_id" => null
    ],
    [
      "user_id" => 100,  // Santucci Annalisa
      "group_id" => null,
      "role_id" => $sede,
      "round_id" => 1,
      "team_id" => null
    ],
    [
      "user_id" => 101,  // Raffaela Cutarelli
      "group_id" => null,
      "role_id" => $sede,
      "round_id" => 1,
      "team_id" => null
    ],
    [
      "user_id" => 102,  // Luca Maria Pellegrini
      "group_id" => null,
      "role_id" => $sede,
      "round_id" => 1,
      "team_id" => null
    ],
    [
      "user_id" => 103,  // Mirco Maggi
      "group_id" => null,
      "role_id" => $sede,
      "round_id" => 1,
      "team_id" => null
    ],
    [
      "user_id" => 104,  // Umberto Berto
      "group_id" => null,
      "role_id" => $sede,
      "round_id" => 1,
      "team_id" => null
    ],

    // ------------------- Round 2 -------------------
    [
      "user_id" => 97,  // Michela Aucello
      "group_id" => null,
      "role_id" => $sede,
      "round_id" => 2,
      "team_id" => null
    ],
    [
      "user_id" => 98,  // Federico Silvagni
      "group_id" => null,
      "role_id" => $sede,
      "round_id" => 2,
      "team_id" => null
    ],
    [
      "user_id" => 99,  // Loredana Orsini
      "group_id" => null,
      "role_id" => $sede,
      "round_id" => 2,
      "team_id" => null
    ],
    [
      "user_id" => 100,  // Santucci Annalisa
      "group_id" => null,
      "role_id" => $sede,
      "round_id" => 2,
      "team_id" => null
    ],
    [
      "user_id" => 101,  // Raffaela Cutarelli
      "group_id" => null,
      "role_id" => $sede,
      "round_id" => 2,
      "team_id" => null
    ],
    [
      "user_id" => 102,  // Luca Maria Pellegrini
      "group_id" => null,
      "role_id" => $sede,
      "round_id" => 2,
      "team_id" => null
    ],
    [
      "user_id" => 103,  // Mirco Maggi
      "group_id" => null,
      "role_id" => $sede,
      "round_id" => 2,
      "team_id" => null
    ],
    [
      "user_id" => 104,  // Umberto Berto
      "group_id" => null,
      "role_id" => $sede,
      "round_id" => 2,
      "team_id" => null
    ],

    // ------------------- Round 3 -------------------
    [
      "user_id" => 97,  // Michela Aucello
      "group_id" => null,
      "role_id" => $sede,
      "round_id" => 3,
      "team_id" => null
    ],
    [
      "user_id" => 98,  // Federico Silvagni
      "group_id" => null,
      "role_id" => $sede,
      "round_id" => 3,
      "team_id" => null
    ],
    [
      "user_id" => 99,  // Loredana Orsini
      "group_id" => null,
      "role_id" => $sede,
      "round_id" => 3,
      "team_id" => null
    ],
    [
      "user_id" => 100,  // Santucci Annalisa
      "group_id" => null,
      "role_id" => $sede,
      "round_id" => 3,
      "team_id" => null
    ],
    [
      "user_id" => 101,  // Raffaela Cutarelli
      "group_id" => null,
      "role_id" => $sede,
      "round_id" => 3,
      "team_id" => null
    ],
    [
      "user_id" => 102,  // Luca Maria Pellegrini
      "group_id" => null,
      "role_id" => $sede,
      "round_id" => 3,
      "team_id" => null
    ],
    [
      "user_id" => 103,  // Mirco Maggi
      "group_id" => null,
      "role_id" => $sede,
      "round_id" => 3,
      "team_id" => null
    ],
    [
      "user_id" => 104,  // Umberto Berto
      "group_id" => null,
      "role_id" => $sede,
      "round_id" => 3,
      "team_id" => null
    ],

    // ############################ ADMIN ############################

    // ------------------- Round 1 -------------------

    [
      "user_id" => 105,  // Pucci
      "group_id" => null,
      "role_id" => $admin,
      "round_id" => null,
      "team_id" => null
    ],
    [
      "user_id" => 106,  // Crimi
      "group_id" => null,
      "role_id" => $admin,
      "round_id" => null,
      "team_id" => null
    ],
    [
      "user_id" => 107,  // Fabrizio (Alessia)
      "group_id" => null,
      "role_id" => $admin,
      "round_id" => null,
      "team_id" => null
    ],
    [
      "user_id" => 108,  // Valentini
      "group_id" => null,
      "role_id" => $admin,
      "round_id" => null,
      "team_id" => null
    ],

  ];
?>
