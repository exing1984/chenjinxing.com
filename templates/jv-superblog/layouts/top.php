<?php if( $this['block']->count('panel') ):?>
    <!--Block panel-->
    <section id="block-panel">
        <div class="container">
            <jdoc:include type="block" name="panel"/>
        </div>
    </section>
    <!--/Block panel-->
<?php endif;?>

<?php
    $header_class = "";    
    $header_2 = strpos($this['option']->get('template.body.class'), 'header-2 ');
    $header_3 = strpos($this['option']->get('template.body.class'), 'header-3 ');
    
    if ($header_2) {$header_class = '-2';} 
    if ($header_3) {$header_class = '-3';} 

?>

<?php if( $this['position']->count('logo') || $this['position']->count('top-banner') || $this['position']->count('menu')):?>
        <header id="block-header" class="header-content<?php echo $header_class;?>">
                <?php if ($this['position']->count('header-left') || $this['position']->count('header-right')) { ?>
                <div class="clearfix header-top">
                    <div class="container">
                            <?php if( $this['position']->count('header-left') ):?>
                                <div class="header-left pull-left">
                                    <jdoc:include type="position" name="header-left" />
                                </div>
                            <?php endif;?>
                            <?php if( $this['position']->count('header-right') ):?>                            
                                <div class="header-right pull-right">
                                    <jdoc:include type="position" name="header-right" />
                                </div>
                            <?php endif;?>
                    </div>
                </div>
                <?php } ?>
                <div class="wrap-headroom">
                    <div class="clearfix header-bottom headroom">
                        <div class="container">
                            <?php if($header_2): ?>
                                <div class="row">
                                    <div class="col-md-8 col-xs-offset-4">
                            <?php endif;?>

                            <?php if( $this['position']->count('logo') ):?>
                            <div class="header-logo pull-left">
                                <jdoc:include type="position" name="logo" />
                            </div>
                            <!-- end logo -->
                            <?php endif;?>
                            <?php if( $this['position']->count('canvas') ):?>
                            <div class="header-banner pull-right ml-10">
                                <div class="position position-top-banner">
                                    <div class="jv-module">                                            
                                        <div class="contentmod clearfix">
                                            <a class="pcanvas-btn-show btn btn-primary" href="JavaScript:void(0);" ><i class="fa fa-bars"></i></a>
                                        </div>   
                                    </div>     
                                </div>
                            </div>
                            <?php endif;?>
                            <?php if( $this['position']->count('top-banner') ):?>
                            <div class="header-banner pull-right">
                                <jdoc:include type="position" name="top-banner" />
                            </div>
                            <!-- end banner top -->
                            <?php endif;?>
                            <?php if( $this['position']->count('menu') && !$header_2):?>
                                <div class="block-mainnav-wrapper pull-right">
                                    <!--Block Mainnav-->
                                    <div id="block-mainnav" class="block-mainnav" data-responsive="<?php echo $this->params->get('menu')->responsive; ?>">
                                        <jdoc:include type="position" name="menu" style="none"/>
                                    </div>
                                    <!--/Block Mainnav-->
                                </div>
                                <a class="flexMenuToggle btn" href="JavaScript:void(0);" ><i class="fa fa-align-justify"></i></a>             
                            <?php endif;?>
                            
                            <?php if($header_2): ?>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            <?php endif;?>
                        </div>
                    </div>
                </div>
        </header>
        <!-- Header content -->
<!--/Block Header-->
<?php endif;?>
<?php if( $this['position']->count('breadcrumb')):?>
<!--Block Breadcrumb-->
    <jdoc:include type="position" name="breadcrumb" style="none" />
<!--/Block Breadcrumb-->
<?php endif;?>



<?php if( $this['position']->count('slideshow') ):?>
    <!--Block Slide-->
    <section id="block-slideshow">
        <div class="container">
            <jdoc:include type="position" name="slideshow" grid-mode="fluid"/>
        </div>
    </section>
    <!--/Block Slide-->
<?php endif;?>


<?php if( $this['block']->count('top') ):?>
    <!--Block top-->
	<section id="block-top">
    	<div class="container">
    		<jdoc:include type="block" name="top"/>
        </div>
    </section>
    <!--/Block top-->
<?php endif;?>


<?php if( $this['block']->count('topt') ):?>
    <!--Block top-->
    <section id="block-topt">
        <div class="container">
            <jdoc:include type="block" name="topt"/>
        </div>
    </section>
    <!--/Block topt-->
<?php endif;?>


<?php if( $this['block']->count('top-a') ):?>
    <!--Block top-->
    <section id="block-top-a">
        <div class="container">
            <jdoc:include type="block" name="top-a"/>
        </div>
    </section>
<?php endif;?>


<?php if( $this['block']->count('top-b') ):?>
    <section id="block-top-b">
        <div class="container">
            <jdoc:include type="block" name="top-b"/>
        </div>
    </section>
<?php endif;?>


<?php if( $this['block']->count('top-c') ):?>
    <section id="block-top-c">
        <div class="container">
            <jdoc:include type="block" name="top-c"/>
        </div>
    </section>
<?php endif;?>

<?php if( $this['block']->count('top-cfull') ):?>
    <section id="block-top-cfull">
            <jdoc:include type="block" name="top-cfull"/>
    </section>
<?php endif;?>


<?php if( $this['block']->count('top-d') ):?>
    <!--Block top-->
    <section id="block-top-d">
        <div class="container">
            <jdoc:include type="block" name="top-d"  />
        </div>
    </section>
    <!--/Block top d-->
<?php endif;?>

<?php if( $this['block']->count('top-dfull') ):?>
    <!--Block top-->
    <section id="block-top-dfull">
        <jdoc:include type="block" name="top-dfull"  />
    </section>
    <!--/Block top d-->
<?php endif;?>

<?php if( $this['block']->count('top-e') ):?>
    <!--Block top e-->
    <section id="block-top-e">
        <div class="container">
            <jdoc:include type="block" name="top-e"  />
        </div>
    </section>
    <!--/Block top e-->
<?php endif;?>

<?php if( $this['block']->count('top-efull') ):?>
    <!--Block top e-->
    <section id="block-top-efull">
        <jdoc:include type="block" name="top-efull"  />
    </section>
    <!--/Block top e-->
<?php endif;?>

<?php if( $this['block']->count('top-f') ):?>
    <!--Block top e-->
    <section id="block-top-f">
        <div class="container">
            <jdoc:include type="block" name="top-f"  />
        </div>
    </section>
    <!--/Block top f-->
<?php endif;?>


<?php if( $this['block']->count('topb') ):?>
    <!--Block topb-->
	<section id="block-topb">
    	<div class="container">
    		<jdoc:include type="block" name="topb"/>
        </div>
    </section>
    <!--/Block topb-->
<?php endif;?>


<?php if($this['block']->count('contenttop')):?>
    <!--Block contenttop-->
    <section id="contenttop" class="contenttop">
        <div class="container">
            <jdoc:include type="block" name="contenttop"/>
        </div>
    </section>
    <!--/Block contenttop-->
<?php endif;?>