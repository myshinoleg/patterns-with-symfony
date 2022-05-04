<?php

namespace App\Controller;

use App\Form\FactoryMethodType;
use App\Form\ObserverType;
use App\Form\PatternsType;
use App\Patterns\Behavioral\Strategy\TradeFactory;
use App\Patterns\Creational\FactoryMethod\IPlatform;
use App\Patterns\Creational\FactoryMethod\PlatformAdapter\FabrAdapter;
use App\Patterns\Creational\FactoryMethod\PlatformAdapter\NepAdapter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PatternsController extends AbstractController
{
	#[Route('patterns', name: 'patterns')]
	public function patterns(): Response
	{
		return $this->render('patterns/index.html.twig');
	}

	#[Route('patternStrategy', name: 'patternStrategy')]
	public function patternStrategy(Request $request, TradeFactory $tradeFactory): Response
	{
		$form = $this->createForm(PatternsType::class);
		$form->handleRequest($request);

		if ($form->isSubmitted())
		{
			$formData = $form->getData();

			if (!isset($formData['tradeType']))
			{
				throw new \InvalidArgumentException('tradeType not received');
			}

			$trade = new ($tradeFactory->setTradeType($formData['tradeType'])->getTradeMethod());

			return $this->redirect($trade->getTradeList());
		}

		return $this->render('patterns/strategy.html.twig', ['form' => $form->createView()]);
	}

    #[Route('patternObserver', name: 'patternObserver')]
    public function patternObserver(Request $request): Response
    {
        $form = $this->createForm(ObserverType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted())
        {
            // todo
        }

        return $this->render('patterns/observer.html.twig', ['form' => $form->createView()]);
    }

    #[Route('patternFactoryMethod', name: 'patternFactoryMethod')]
    public function patternFactoryMethod(Request $request): Response
    {
        $searches[] = array_map(function (IPlatform $adapter) {
            $searchPlatform = $adapter->getInstance()->getSearchPlatform();
            return $searchPlatform->getLink();
        },
            [FabrAdapter::getInstance(), NepAdapter::getInstance()]
        );

        $form = $this->createForm(FactoryMethodType::class, $searches);
        $form->handleRequest($request);

        //todo::поиск по заполненной платформе

        return $this->render('patterns/patternForm.html.twig', ['form' => $form->createView()]);
    }
}