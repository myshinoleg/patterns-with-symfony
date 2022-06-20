<?php

namespace App\Controller;

use App\Form\AbstractFactoryType;
use App\Form\BuilderType;
use App\Form\FactoryMethodType;
use App\Form\ObserverType;
use App\Form\PatternsType;
use App\Form\PatternIteratorType;
use App\Patterns\Behavioral\Iterator\Collection;
use App\Patterns\Behavioral\Iterator\Item;
use App\Patterns\Behavioral\Observer\Consumers\Multiplication;
use App\Patterns\Behavioral\Observer\Consumers\Sum;
use App\Patterns\Behavioral\Observer\Notifier;
use App\Patterns\Behavioral\Strategy\TradeFactory;
use App\Patterns\Creational\AbstractFactory\PlatformFactory;
use App\Patterns\Creational\Builder\BuilderFactory;
use App\Patterns\Creational\Builder\IBuilder;
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
    public function patternObserver(Request $request, Multiplication $multiplication, Sum $sum): Response
    {
        $form = $this->createForm(ObserverType::class);
        $form->handleRequest($request);

        $notifier = new Notifier();
        $notifier->attach($sum);
        $notifier->attach($multiplication);

        if ($form->isSubmitted())
        {
            $formData = $form->getData();
            $notifier->calculate($formData['var1'], $formData['var2']);
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

        return $this->render('patterns/patternForm.html.twig', ['form' => $form->createView()]);
    }

	#[Route('patternIterator', name: 'patternIterator')]
	public function patternIterator(Request $request): Response
	{
		$form = $this->createForm(PatternIteratorType::class);
		$form->handleRequest($request);

		if ($form->isSubmitted())
		{
			$collection = new Collection();
			$formData = $form->getData();

			if ($formData['countElements'] && $formData['countElements'] > 0)
			{
				for ($i = 0; $i < $formData['countElements']; $i++)
				{
					$element = new Item($i);
					$collection->addItem($element);
				}

				$text = '';
				foreach ($collection as $item)
				{
					$text .= $item->print();
				}
				echo ($text);die;
			}
		}

		return $this->render('patterns/patternForm.html.twig', ['form' => $form->createView()]);
	}

	#[Route('patternBuilder', name: 'patternBuilder')]
	public function patternBuilder(Request $request): Response
	{
		$form = $this->createForm(BuilderType::class);
		$form->handleRequest($request);

		if ($form->isSubmitted())
		{
			$formData = $form->getData();
			$builder = BuilderFactory::getBuilder($formData['tradeType']);
			$builder->createHeader('Welcome!')
				->createBody('WAAA')
				->createBottom('phone');

			return $this->render('patterns/builder.html.twig', ['content' => $builder->getContent()]);
		}

		return $this->render('patterns/patternForm.html.twig', ['form' => $form->createView()]);
	}

	#[Route('patternAbstractFactory', name: 'patternAbstractFactory')]
	public function patternAbstractFactory(Request $request): Response
	{
		$form = $this->createForm(BuilderType::class);
		$form->handleRequest($request);

		if ($form->isSubmitted())
		{
			$formData = $form->getData();
			$factory = new PlatformFactory();
			$platform = $factory->factory($formData['tradeType']);

			$platform->getTitle();
			$platform->getLink();

			return $this->render(
				'patterns/abstractFactory.html.twig',
				['title' => $platform->getTitle(), 'link' => $platform->getLink()]
			);
		}

		return $this->render('patterns/patternForm.html.twig', ['form' => $form->createView()]);
	}
}