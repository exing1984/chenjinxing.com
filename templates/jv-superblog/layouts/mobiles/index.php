<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<?php
	echo $this['template']->render('head');	

    include($this['path']->findPath('style.config.php'));
    ?>
</head>
<body id="mobile" class="<?php echo $this['option']->get('template.body.class'); ?>">
<div id="wrapper">
  <div id="block-mainnav-mobile">
    <jdoc:include type="position" name="menu" style="raw" />
  </div>
  <div id="mainsite"> <span class="flexMenuToggle" ></span>
    
    <?php
        $header_class = "";    
        $header_2 = strpos($this['option']->get('template.body.class'), 'header-2 ');
        $header_3 = strpos($this['option']->get('template.body.class'), 'header-3 ');
        
        if ($header_2) {$header_class = '-2';} 
        if ($header_3) {$header_class = '-3';} 

    ?>

    <?php if( $this['position']->count('logo') || $this['position']->count('top-banner') || $this['position']->count('menu')):?>
            <header id="block-header" class="header-content<?php echo $header_class;?>">
                    
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

    <section  id="block-main">
      <div class="container">
        <jdoc:include type="message" />
        <jdoc:include type="component" />
        <jdoc:include type="position" name="content-top"  />
        <jdoc:include type="position" name="content-bottom"  />
      </div>
    </section>
    <?php if($this['block']->count('contentbottom')):?>
        <section id="contentbottom" class="contentbottom">
            <div class="container">
                <jdoc:include type="block" name="contentbottom"/>
            </div>
        </section>
        <!--/Block contentbottom-->
    <?php endif;?>

    <?php if( $this['block']->count('bottom') ):?>
      <section id="block-bottom">
          <div class="container">
              <jdoc:include type="block" name="bottom"/>
            </div>
        </section>
        <!--/Block bottom-->
    <?php endif;?>

    <?php if( $this['block']->count('bottomt') ):?>
        <section id="block-bottomt">
            <div class="container">
                <jdoc:include type="block" name="bottomt"/>
            </div>
        </section>
        <!--/Block bottom-->
    <?php endif;?>

    <?php if( $this['block']->count('bottom-a') ):?>
        <section id="block-bottom-a">
            <div class="container">
                <jdoc:include type="block" name="bottom-a"/>
            </div>
        </section>
        <!--/Block bottom-a-->
    <?php endif;?>

    <?php if( $this['block']->count('bottom-b') ):?>
        <section id="block-bottom-b">
            <div class="container">
                <jdoc:include type="block" name="bottom-b"/>
            </div>
        </section>
        <!--/Block bottom-b -->
    <?php endif;?>

    <?php if( $this['block']->count('bottom-c') ):?>
        <section id="block-bottom-c">
            <div class="container">
                <jdoc:include type="block" name="bottom-c"/>
            </div>
        </section>
        <!--/Block bottom-c -->
    <?php endif;?>

    <?php if( $this['block']->count('bottom-d') ):?>
        <section id="block-bottom-d">
            <div class="container">
                <jdoc:include type="block" name="bottom-d"/>
            </div>
        </section>
        <!--/Block bottom-d -->
    <?php endif;?>
    <?php if( $this['block']->count('bottom-dfull') ):?>
        <section id="block-bottom-dfull">
            <jdoc:include type="block" name="bottom-dfull" grid-mode="fluid"/>
        </section>
        <!--/Block bottom-d -->
    <?php endif;?>

    <?php if( $this['block']->count('bottom-e') ):?>
        <section id="block-bottom-e">
            <div class="container">
                <jdoc:include type="block" name="bottom-e"/>
            </div>
        </section>
        <!--/Block bottom-e -->
    <?php endif;?>

    <?php if( $this['block']->count('bottom-efull') ):?>
        <section id="block-bottom-efull">
            <jdoc:include type="block" name="bottom-efull" grid-mode="fluid"/>
        </section>
        <!--/Block bottom-e -->
    <?php endif;?>

    <?php if( $this['block']->count('bottom-f') ):?>
        <section id="block-bottom-f">
            <div class="container">
                <jdoc:include type="block" name="bottom-f"/>
            </div>
        </section>
        <!--/Block bottom-f -->
    <?php endif;?>
    <div class="footer">
      <?php if( $this['position']->count('footer') || $this['position']->count('footer-menu')):?>
          <!--Block Footer-->
          <footer id="block-footer" class="blk-footer">
              <div class="container">
                  <div class="row">
                      <?php if( $this['position']->count('footer-menu')):?>
                      <div class="col-md-9 col-menu">
                          <jdoc:include type="position" name="footer-menu" style="none"/>
                      </div>
                      <?php endif ?>
                      <div class="col-md-<?php echo ($this['position']->count('footer-menu'))?'3 text-right':'12 text-center';?> col-copyright">
                          <jdoc:include type="position" name="footer"/>
                      </div>
                  </div>
              </div>
          </footer>
          <!--/Block Footer-->
      <?php endif;?>
  </div>    
  <!-- end footer -->
  </div>
</div>
</body>
</html>