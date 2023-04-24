<?php

namespace App\Form\Type;

use App\Entity\Immobilie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImmoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titel', TextType::class, [
				'label' => 'Titel',
				'attr' => ['placeholder' => 'Titel'],
				'row_attr' => ['class' => 'form-floating m-1 mx-5']
			])
            ->add('beschreibung', TextType::class, [
				'label' => 'Beschreibung',
				'attr' => ['placeholder' => 'Beschreibung'],
				'row_attr' => ['class' => 'form-floating m-1 mx-5']
			])
            ->add('ort', TextType::class, [
				'label' => 'Ort',
				'attr' => ['placeholder' => 'Ort'],
				'row_attr' => ['class' => 'form-floating m-1 mx-5']
			])
            ->add('plz', TextType::class, [
				'label' => 'PLZ',
				'attr' => ['placeholder' => 'PLZ'],
				'row_attr' => ['class' => 'form-floating m-1 mx-5']
			])
            ->add('save', SubmitType::class, [
				'attr' => ['class' => 'btn btn-primary m-1 ml-0 mx-5']
			])
        ;
    }

	public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Immobilie::class,
        ]);
    }
}

?>