<?php

namespace MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactoType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
//                ->add('nombre', TextType::class, array("label" => "Nombre", "required" => "required", 'attr' => array(
//                        "class" => "form-control", 'style' => 'margin-bottom:15px', 'placeholder' => ''),
//                    'constraints' => array(
//                        new NotBlank(array("message" => "Please provide your name")),
//                    )
//                ))
//                ->add('email', EmailType::class, array("label" => "Email", "required" => "required", 'attr' => array(
//                        "class" => "form-control", 'style' => 'margin-bottom:15px', 'placeholder' => ''),
//                    'constraints' => array(
//                        new NotBlank(array("message" => "Please provide a valid email")),
//                        new Email(array("message" => "Your email doesn't seems to be valid")),
//                    )
//                ))
//                ->add('fono', TextType::class, array("label" => "Telefono", "required" => "required", 'attr' => array(
//                        "class" => "form-control", 'style' => 'margin-bottom:15px', 'placeholder' => ''),
//                    'constraints' => array(
//                        new NotBlank(array("message" => "Please provide a valid email"))
//                    )
//                ))
//                ->add('motivo', TextType::class, array("label" => "Motivo", "required" => "required", 'attr' => array(
//                        "class" => "form-control", 'style' => 'margin-bottom:15px;', 'placeholder' => ''),
//                    'constraints' => array(
//                        new NotBlank(array("message" => "Please give a Subject")),
//                    )
//                ))
//                ->add('mensaje', TextareaType::class, array("label" => "Mensaje", "required" => "required", 'attr' => array(
//                        "class" => "form-control", 'style' => 'margin-bottom:15px; height:100px;', 'placeholder' => ''),
//                    'constraints' => array(
//                        new NotBlank(array("message" => "Please provide a message here")),
//                    )
//                ))
//                ->add('enviar', SubmitType::class, array(
//                    'label' => 'Enviar', 'attr' => array(
//                        'class' => 'btn btn-primary btn-block pull-right', 'style' => 'margin-bottom:15px')))
                ->add('nombre', TextType::class)
                ->add('email', EmailType::class)
                ->add('fono', TextType::class)
                ->add('motivo', TextType::class)
                ->add('mensaje', TextareaType::class)
                ->add('enviar', SubmitType::class)
        ;
    }

    public function setDefaultOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'error_bubbling' => true
        ));
    }

    public function getName() {
        return 'contact_form';
    }

}
