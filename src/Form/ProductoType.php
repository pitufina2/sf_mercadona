<?php

namespace App\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Producto;
use App\Entity\Categoria;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('descripcion')
            ->add('precio')
            ->add('categoria',EntityType::class,array(
                'class' => Categoria::class,
                'choice_label' => function ($categoria) {
                    return $categoria->getNombre();
            }))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Producto::class,
        ]);
    }
}
