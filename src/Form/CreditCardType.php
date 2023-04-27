<?php

namespace App\Form\Type;

use App\Entity\Charge;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\{
    ChoiceType,
    TextType
};
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreditCardType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, [
            'label' => 'Name on Card'
        ]);

        $builder->add('number', TextType::class, [
            'label' => 'Card Number'
        ]);

        $builder->add('expirationMonth', ChoiceType::class, [
            'label' => 'Expiration Month',
            'choices' => [
                '01' => '01',
                '02' => '02',
                '03' => '03',
                '04' => '04',
                '05' => '05',
                '06' => '06',
                '07' => '07',
                '08' => '08',
                '09' => '09',
                '10' => '10',
                '11' => '11',
                '12' => '12'
            ]
        ]);

        $startYear = date('Y');
        $endYear = ($startYear + 10);
        $years = range($startYear,$endYear);

        $expirationYearChoices = array_combine(
            $years,
            $years
        );

        $builder->add('expirationYear', ChoiceType::class, [
            'label' => 'Expiration Year',
            'choices' => $expirationYearChoices
        ]);

        $builder->add('cvc', TextType::class, [
            'label' => 'CVC'
        ]);

        $builder->add('address', TextType::class, [
            'label' => 'Street Address'
        ]);

        $builder->add('postalCode', TextType::class, [
            'label' => 'Postal Code'
        ]);
    }

    public function getBlockPrefix()
    {
        return 'creditCard';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CreditCard::class,
            'required' => false
        ]);
    }

}
