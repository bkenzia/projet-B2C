<?php

namespace App\Controller\Admin;

use App\Entity\Realisation;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RealisationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Realisation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            TextField::new('Nom'),
            TextEditorField::new('description'),
            SlugField::new('Slug')->setTargetFieldName('Nom')->hideOnForm(),
            
            DateField::new('CreatedAt')->hideOnForm(),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('file')->setBasePath('/uploads/images/realisations')->onlyOnIndex(),
            
            BooleanField::new('Portfolio')->setColumns(2),
            AssociationField::new('categorie'),
            AssociationField::new('images')->hideOnForm(),
            
            // TextEditorField::new('description'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['createdAt' => 'DESC']);
    }
}
