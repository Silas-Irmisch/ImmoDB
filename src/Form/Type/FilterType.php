<?php

namespace App\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\FormBuilderInterface;

class FilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('filter', SearchType::class, [
				'label' => 'Filter',
				'attr' => ['placeholder' => 'Filter'],
				'row_attr' => [
					'class' => 'form-floating m-1 mx-5'
				],
				'required' => false
			])
        ;
    }
}

?>