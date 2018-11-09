<?php

/*
 * This file is part of AppName.
 *
 * (c) Monofony
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Form\Type;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Loïc Frémont <loic@mobizel.com>
 */
class AddressType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('street', TextType::class, [
                'label' => 'sylius.ui.street',
            ])
            ->add('postcode', TextType::class, [
                'label' => 'sylius.ui.postcode',
            ])
            ->add('city', TextType::class, [
                'label' => 'sylius.ui.city',
            ])
            ->add('birthday', BirthdayType::class, [
                'label' => 'Date de naissance',
                'widget' => 'choice',
                'mapped' => false,
                'required' => false,
            ])
            ->add('date', DatePickerType::class, [
                'label' => 'Date picker',
                'mapped' => false,
                'required' => false,
            ])
            ->add('dateTime', DateTimePickerType::class, [
                'label' => 'Date picker avec heure',
                'mapped' => false,
                'required' => false,
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'app_address';
    }
}