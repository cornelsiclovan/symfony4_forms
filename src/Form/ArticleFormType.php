<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Tests\Fixtures\Author;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.01.2019
 * Time: 15:33
 */

class ArticleFormType extends AbstractType
{
    private $userRepository;

    public function __construct(UserRepository $userRepositor){
        $this->userRepository = $userRepositor;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class,[
                'help' => 'Choose something catchy!'
            ])
            ->add('content')
            ->add('publishedAt', null,[
                'widget' => 'single_text'
            ])
            ->add('author', UserSelectTextType::class)
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
           'data_class' => Article::class,
        ]);
    }


}