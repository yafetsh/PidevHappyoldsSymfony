<?php

namespace GrapheBundle\Controller;

use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use DonsBundle\Entity\CategorieDemande;
use DonsBundle\Entity\Don;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $pieChart = new PieChart();
        $em= $this->getDoctrine();
        $classes = $em->getRepository(Don::class)->findAll();
//         $maison = $this->getDoctrine()->getRepository(CategorieDemande::class)->findByNomCategorie($nom);

        //$totalEtudiant=0;
        $totalQuantite=0;

        foreach($classes as $classe) {
            $totalQuantite=$totalQuantite+$classe->getQuantiteDon();
        }

        $data= array();
        $stat=['categorie', 'quantiteCategorie'];
        $nb=0;
        array_push($data,$stat);
        foreach($classes as $classe) {
            $stat=array();
            array_push($stat,$classe->getDescriptionDon(),(($classe->getQuantiteDon()) *100)/$totalQuantite);
            $nb=($classe->getQuantiteDon() *100)/$totalQuantite;
            $stat=[$classe->getDescriptionDon(),$nb];
            array_push($data,$stat);
        }
        $pieChart->getData()->setArrayToDataTable(
            $data
        );
        $pieChart->getOptions()->setTitle('Statistiques des dons');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);
        return $this->render('@Graphe\Default\index.html.twig', array('piechart' => $pieChart));
    }
}
