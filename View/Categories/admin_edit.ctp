<div class="page-header">
    <h2><?php echo $title_for_layout; ?></h2>
</div>

<?php
echo $this->Form->create(
    'Category',
    array(
        'class' => 'form-horizontal',
        'inputDefaults' => array(
            'label' => false,
            'div' => false
        )
    )
);
?>

<div class="form-group<?php echo $this->Form->isFieldError('name') ? ' has-error' : ''; ?>">
    <?php echo $this->Form->label('name', __d('hurad', 'Name'), array('class' => 'control-label col-lg-2')); ?>
    <div class="col-lg-4">
        <?php
        echo $this->Form->input(
            'name',
            array(
                'error' => array(
                    'nameRule-1' => __d('hurad', 'This field cannot be left blank.'), //notEmpty rule message
                    'attributes' => array(
                        'wrap' => 'span',
                        'class' => 'help-block'
                    )
                ),
                'required' => false, //For disable HTML5 validation
                'type' => 'text',
                'class' => 'form-control'
            )
        );
        ?>
    </div>

    <span class="help-block">
            <?php echo __d('hurad', 'The name is how it appears on your site.'); ?>
    </span>
</div>
<div class="form-group<?php echo $this->Form->isFieldError('slug') ? ' has-error' : ''; ?>">
    <?php echo $this->Form->label('slug', __d('hurad', 'Slug'), array('class' => 'control-label col-lg-2')); ?>
    <div class="col-lg-4">
        <?php
        echo $this->Form->input(
            'slug',
            array(
                'error' => array(
                    'slugRule-1' => __d('hurad', 'This field cannot be left blank.'), //notEmpty rule message
                    'slugRule-2' => __d('hurad', 'This slug has already exist.'), //isUnique rule message
                    'attributes' => array(
                        'wrap' => 'span',
                        'class' => 'help-block'
                    )
                ),
                'required' => false, //For disable HTML5 validation
                'type' => 'text',
                'class' => 'form-control'
            )
        );
        ?>
    </div>
    <span class="help-block">
        <?php echo __(
            'The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.'
        ); ?>
    </span>
</div>
<?php if (Router::getParams()['pass'][0] != "1") { ?>
    <div class="form-group">
        <?php echo $this->Form->label(
            'parent_id',
            __d('hurad', 'Parent Category'),
            array('class' => 'control-label col-lg-2')
        ); ?>
        <div class="col-lg-4">
            <?php echo $this->Form->select(
                'parent_id',
                $parentCategories,
                array('empty' => __d('hurad', 'None'), 'class' => 'form-control')
            ); ?>
        </div>
    <span class="help-block">
            <?php echo __(
                'Categories, unlike tags, can have a hierarchy. You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.'
            ); ?>
    </span>
    </div>
<?php } ?>
<div class="form-group">
    <?php echo $this->Form->label(
        'description',
        __d('hurad', 'Description'),
        array('class' => 'control-label col-lg-2')
    ); ?>
    <div class="col-lg-6">
        <?php echo $this->Form->input('description', array('class' => 'form-control')); ?>
    </div>
        <span class="help-block">
            <?php echo __d(
                'hurad',
                'The description is not prominent by default; however, some themes may show it.'
            ); ?>
        </span>
</div>

<?php echo $this->Form->submit(__d('hurad', 'Update Category'), array('class' => 'btn btn-primary')); ?>

<?php echo $this->Form->end(null); ?>