<?php

namespace App\Form\TypeExtension;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormTypeExtensionInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.01.2019
 * Time: 17:12
 */

class TextareaSizeExtension implements FormTypeExtensionInterface
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['attr']['rows'] = 10;
    }

    public function finishView(FormView $view, FormInterface $form, array $options)
    {

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getExtendedType()
    {
        return TextareaType::class;
    }

}