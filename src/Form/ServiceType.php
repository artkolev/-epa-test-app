<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\Service;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('service', EntityType::class, [
            'class' => Service::class,
            'choice_label' => 'Услуга',
            'placeholder' => 'Выберите услугу',
        ]);
    }
}
