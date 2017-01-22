<?php

namespace Projecten\Bakkerij\Business;

use Projecten\Bakkerij\Entities\BestelLijn;
use Projecten\Bakkerij\Entities\Bestelling;
use Projecten\Bakkerij\Data\BestelLijnDAO;
use Projecten\Bakkerij\Data\BestellingDAO;
use Projecten\Bakkerij\Exceptions\KlantGeblokkeerdException;
use Projecten\Bakkerij\Exceptions\BestellingNegatiefAantal;

class BestelService {

    public function getBestellingen($klant) {
        $bestelDAO = new BestellingDAO;
        $bestellingen = $bestelDAO->getByEmail($klant->getEmail());
        $bestellijnDAO = new BestellijnDAO;
        foreach ($bestellingen as $bestelling) {
            $totaalPrijs = $bestelling->getTotaalPrijs(); 
            $bestellijnDAO->addByBestelIdToBestellingen($bestelling->getBestelId());
            $bestelling->setTotaalPrijs($totaalPrijs); 
        }
        return $bestellingen;
    }

    public function startNieuweBestelling($klant) {
        if ($klant->getGeblokkeerd() == 1) {
            throw new KlantGeblokkeerdException();
        }
        $bestelling = new Bestelling($klant);
        return $bestelling;
    }

    public function voegToe($bestelling, $product, $aantal) {
        if ($aantal < 0) {
            throw new BestellingNegatiefAantal;
        }
        $bestellijn = new BestelLijn($product, $aantal);
        $bestelling->addBestelLijnMetKostprijs($bestellijn);
    }

    public function slaBestellingOp($klant, $bestelling, $afhaalDag) {
        if ($klant->getGeblokkeerd() == 1) {
            throw new KlantGeblokkeerdException();
        }
        $bestelling->setAfhaalDag($afhaalDag);
        $bestellingDAO = new BestellingDAO;
        $bestellingDAO->slaBestellingOp($bestelling);
    }

    public function deleteBestelling($bestelId, $klant) {
        $bestelDAO = new BestellingDAO;
        $bestelling = $bestelDAO->getById($_GET["bestelid"]);
        if ($bestelling->getKlant() == $klant) {
            $bestelDAO->deleteBestelling($bestelling);
        }
    }

}
