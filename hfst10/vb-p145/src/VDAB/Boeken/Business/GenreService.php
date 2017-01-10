<?php
//business/GenreService.php


namespace VDAB\Boeken\Business; 
use VDAB\Boeken\Data\GenreDAO; 

class GenreService {

    public function getGenresOverzicht() {
        $genreDAO = new GenreDAO();
        $lijst = $genreDAO->getAll();
        return $lijst;
    }

    public function haalBoekOp($id) {
        $boekDAO = new BoekDAO();
        $boek = $boekDAO->getById($id);
        return $boek;
    }

    public function updateBoek($id, $titel, $genreId) {
        $genreDAO = new GenreDAO();
        $boekDAO = new BoekDAO();
        $genre = $genreDAO->getById($genreId);
        $boek = $boekDAO->getById($id);
        $boek->setTitel($titel);
        $boek->setGenre($genre);
        $boekDAO->update($boek);
    }

}
