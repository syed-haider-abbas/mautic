<?php
/**
 * @package     Mautic
 * @copyright   2014 Mautic Contributors. All rights reserved.
 * @author      Mautic
 * @link        http://mautic.org
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace Mautic\CoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class FormButtonsType
 */
class FormButtonsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        foreach ($options['pre_extra_buttons'] as $btn) {
            $type = (empty($btn['type'])) ? 'button' : 'submit';
            $builder->add($btn['name'], $type, array(
                'label' => $btn['label'],
                'attr'  => $btn['attr']
            ));
        }

        if (!empty($options['apply_text'])) {
            $builder->add('apply', 'submit', array(
                'label' => $options['apply_text'],
                'attr'  => array(
                    'class'   => $options['apply_class'],
                    'icon'    => $options['apply_icon'],
                    'onclick' => $options['apply_onclick']
                )
            ));
        }

        if (!empty($options['save_text'])) {
            $builder->add('save', 'submit', array(
                'label' => $options['save_text'],
                'attr'  => array(
                    'class'   => $options['save_class'],
                    'icon'    => $options['save_icon'],
                    'onclick' => $options['save_onclick']
                )
            ));
        }

        if (!empty($options['cancel_text'])) {
            $builder->add('cancel', 'submit', array(
                'label' => $options['cancel_text'],
                'attr'  => array(
                    'class'   => $options['cancel_class'],
                    'icon'    => $options['cancel_icon'],
                    'onclick' => $options['cancel_onclick']
                )
            ));
        }

        foreach ($options['post_extra_buttons'] as $btn) {
            $type = (empty($btn['type'])) ? 'button' : 'submit';
            $builder->add($btn['name'], $type, array(
                'label' => $btn['label'],
                'attr'  => $btn['attr']
            ));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'apply_text'         => 'mautic.core.form.apply',
            'apply_icon'         => 'fa fa-check text-success',
            'apply_class'        => 'btn btn-default',
            'apply_onclick'      => false,
            'save_text'          => 'mautic.core.form.saveandclose',
            'save_icon'          => 'fa fa-save',
            'save_class'         => 'btn btn-default',
            'save_onclick'       => false,
            'cancel_text'        => 'mautic.core.form.cancel',
            'cancel_icon'        => 'fa fa-times text-danger',
            'cancel_class'       => 'btn btn-default',
            'cancel_onclick'     => false,
            'mapped'             => false,
            'label'              => false,
            'required'           => false,
            'pre_extra_buttons'  => array(),
            'post_extra_buttons' => array(),
            'container_class'    => 'bottom-form-buttons'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'form_buttons';
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['containerClass'] = $options['container_class'];
    }
}
