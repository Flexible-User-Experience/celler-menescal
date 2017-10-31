<?php

namespace Flux\ProductBundle\Admin;

use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

/**
 * Class ProductAdmin.
 */
class ProductAdmin extends AbstractAdmin
{
    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'ASC', // sort direction
        '_sort_by' => 'code', // field name
    );
    protected $baseRoutePattern = 'wine';

    /**
     * @return array
     */
    public function getExportFormats()
    {
        return array('xls', 'csv');
    }

    /**
     * @param RouteCollection $collection
     */
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('delete');
        $collection->remove('show');
        $collection->remove('batch');
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('code', null, array('label' => $this->trans('page.code')))
            ->add('name', null, array('label' => $this->trans('page.name'), 'editable' => true))
            ->add(
                'category',
                null,
                array(
                    'label' => $this->trans('page.category'),
                    'sortable' => true,
                    'sort_field_mapping' => array('fieldName' => 'title'),
                    'sort_parent_association_mappings' => array(array('fieldName' => 'category')),
                )
            )
            ->add(
                'image1',
                null,
                array(
                    'label' => $this->trans('page.image1'),
                    'template' => 'MainBundle:Admin:customimg1.html.twig',
                    'sortable' => false,
                )
            )
            ->add('position', null, array('label' => $this->trans('page.position'), 'editable' => true))
            ->add('is_active', 'boolean', array('label' => $this->trans('page.active'), 'editable' => true))
            // add custom action links
            ->add(
                '_action',
                'actions',
                array(
                    'actions' => array(
                        'edit' => array(),
                    ),
                    'label' => $this->trans('page.actions'),
                )
            );
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array('label' => $this->trans('page.name')))
            ->add('category', null, array('label' => $this->trans('page.category')))
            ->add('isActive', null, array('label' => $this->trans('page.active')));
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
            ->add('category', 'sonata_type_model', array('label' => $this->trans('page.category')), array())
            ->add('code', 'text', array('label' => $this->trans('page.code')))
            ->add('name', 'text', array('label' => $this->trans('page.name')))
            ->add('type', 'text', array('label' => 'Tipus', 'required' => false))
            ->add('degrees', 'number', array('label' => 'Graus', 'required' => false))
            ->add('bottles', 'number', array('label' => 'Producció ampolles', 'required' => false))
            ->add('mix', 'text', array('label' => 'Varietats', 'required' => false))
            ->add('presentation', 'text', array('label' => 'Presentació', 'required' => false))
            ->end()
            ->with('Descripcions')// DESCRIPTIONS
            ->add(
                'vinification',
                'ckeditor',
                array(
                    'label' => 'Vinificació',
                    'required' => false,
                    'attr' => array(
                        'style' => 'height:400px',
                    ),
                )
            )
            ->add(
                'taste_note',
                'ckeditor',
                array(
                    'label' => 'Nota de cata',
                    'required' => false,
                    'attr' => array(
                        'style' => 'height:400px',
                    ),
                )
            )
            ->add(
                'marriage',
                'ckeditor',
                array(
                    'label' => 'Maridatge',
                    'required' => false,
                    'attr' => array(
                        'style' => 'height:400px',
                    ),
                )
            )
            ->end()
            ->with('SEO')// SEO
            ->add('metaTitle', 'text', array('label' => $this->trans('page.metatitle'), 'required' => false))
            ->add(
                'metaDescription',
                'text',
                array('label' => $this->trans('page.metadescription'), 'required' => false)
            )
            ->end()
            ->with('Imatges')// IMAGES
            ->add('image1File', 'file', array('label' => $this->trans('page.upload.image1'), 'required' => false))
            ->add(
                'image1',
                null,
                array('label' => $this->trans('page.image1'), 'required' => false, 'read_only' => true)
            )
            ->add('altImage1', 'text', array('label' => $this->trans('page.altimage1'), 'required' => false))
            ->add('titleImage1', 'text', array('label' => $this->trans('page.titleimage1'), 'required' => false))
            ->end()
            ->with('Controls')// CONTROLS
            ->add('position', 'integer', array('label' => $this->trans('page.position')))
            ->add('is_active', 'checkbox', array('label' => $this->trans('page.active'), 'required' => false))
            ->end()
            ->with('Traduccions')// TRANSLATIONS
            ->add(
                'translations',
                'a2lix_translations_gedmo',
                array(
                    'label' => ' ',
                    'required' => false,
                    'translatable_class' => 'Flux\ProductBundle\Entity\Product',
                    'fields' => array(
                        'name' => array('label' => 'Nom'),
                        'type' => array('label' => 'Tipus'),
                        'mix' => array('label' => 'Varietats'),
                        'presentation' => array('label' => 'Presentació'),
                        'vinification' => array(
                            'label' => 'Nota de cata',
                            'attr' => array(
                                'class' => 'ckeditor',
                                'style' => 'height:400px',
                            ),
                        ),
                        'taste_note' => array(
                            'label' => 'Nota de cata',
                            'attr' => array(
                                'class' => 'ckeditor',
                                'style' => 'height:400px',
                            ),
                        ),
                        'marriage' => array(
                            'label' => 'Maridatge',
                            'attr' => array(
                                'class' => 'ckeditor',
                                'style' => 'height:400px',
                            ),
                        ),
                        'metaTitle' => array('label' => $this->trans('page.metatitle')),
                        'metaDescription' => array('label' => $this->trans('page.metadescription')),
                        'altImage1' => array('label' => $this->trans('page.altimage1')),
                        'titleImage1' => array('label' => $this->trans('page.titleimage1')),
                    ),
                )
            )
            ->end()
        ;
    }
}
