<?php

namespace App\Form;

use App\Entity\OfferSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OfferSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('maxPrice', IntegerType::class, [
              'required' => false,
              'label' => false,
              'attr' => [
                'placeholder' => 'Prix max.'
              ]
            ])
            ->add('minSurface', IntegerType::class, [
              'required' => false,
              'label' => false,
              'attr' => [
                'placeholder' => 'Surface min.'
              ]
            ])
            ->add('minRooms', IntegerType::class, [
              'required' => false,
              'label' => false,
              'attr' => [
                'placeholder' => 'Pièces min.'
              ]
            ])
            ->add('minBedRooms', IntegerType::class, [
              'required' => false,
              'label' => false,
              'attr' => [
                'placeholder' => 'Chambres min.'
              ]
            ])
            ->add('type', ChoiceType::class, [
              'required' => false,
              'label' => false,
              'placeholder' => 'Type de bail',
              'choices' => $this->getTypes()
            ])
            ->add('habitat', ChoiceType::class, [
              'required' => false,
              'label' => false,
              'placeholder' => 'Type de bien',
              'choices' => $this->getHabitats()
            ])
            ->add('heat', ChoiceType::class, [
              'required' => false,
              'label' => false,
              'placeholder' => 'Type de chauffage',
              'choices' => $this->getHeat()
            ])
            ->add('city', TextType::class, [
              'required' => false,
              'label' => false,
              'attr' => [
                'placeholder' => 'Ville'
              ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OfferSearch::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
      return '';
    }

    private function getHabitats() {

        $habitats = OfferSearch::HABITAT;
        $choices = [];

        foreach ($habitats as $k => $i) {
          $choices[$i] = $k;
        }

        return $choices;
      }

    private function getTypes() {

      $types = OfferSearch::TYPE;
      $choices = [];

      foreach ($types as $k => $i) {
        $choices[$i] = $k;
      }

      return $choices;
    }

    private function getHeat() {

      $heat = OfferSearch::HEAT;
      $choices = [];

      foreach ($heat as $k => $i) {
        $choices[$i] = $k;
      }

      return $choices;
    }
}
