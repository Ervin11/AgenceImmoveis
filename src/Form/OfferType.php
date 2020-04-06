<?php

namespace App\Form;

use App\Entity\Offer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OfferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
              'label' => 'Titre',
            ])
            ->add('description', TextareaType::class, ['label' => 'Description', 'required' => false])
            ->add('type', ChoiceType::class, [
              'label' => 'Type',
              'choices' => $this->getTypes()
            ])
            ->add('habitat', ChoiceType::class, [
              'label' => 'Habitat',
              'choices' => $this->getHabitats()
            ])
            ->add('surface', IntegerType::class, ['label' => 'Surface'])
            ->add('rooms', IntegerType::class, ['label' => 'Pièces'])
            ->add('bedrooms', IntegerType::class, ['label' => 'Chambres'])
            ->add('floor', IntegerType::class, ['label' => 'Étages'])
            ->add('price', IntegerType::class, ['label' => 'Prix'])
            ->add('heat', ChoiceType::class, [
              'label' => 'Chauffage',
              'choices' => $this->getHeat()
            ])
            ->add('city', TextType::class, ['label' => 'Ville'])
            ->add('address', TextType::class, ['label' => 'Adresse'])
            ->add('postal_code', TextType::class, ['label' => 'Code Postal'])
            ->add('sold',CheckboxType::class, ['label' => 'Vendu', 'required' => false])
            ->add('submit', SubmitType::class, [
              'attr' => [
                'class' => 'btn btn-success w-25'
              ],
              'label' => 'Ajouter'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Offer::class,
        ]);
    }

    private function getHabitats() {

      $habitats = Offer::HABITAT;
      $choices = [];

      foreach ($habitats as $k => $i) {
        $choices[$i] = $k;
      }

      return $choices;
    }

    private function getTypes() {

      $types = Offer::TYPE;
      $choices = [];

      foreach ($types as $k => $i) {
        $choices[$i] = $k;
      }

      return $choices;
    }

    private function getHeat() {

      $heat = Offer::HEAT;
      $choices = [];

      foreach ($heat as $k => $i) {
        $choices[$i] = $k;
      }

      return $choices;
    }
}
