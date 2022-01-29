<?php

namespace App\Controller;

use App\Form\PatternsType;
use App\Patterns\Behavioral\Strategy\TradeFactory;
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
}