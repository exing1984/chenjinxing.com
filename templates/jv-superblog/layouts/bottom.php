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
    <?php if( $this['block']->count('footer-top-left') || $this['block']->count('footer-top-right') || $this['block']->count('footer-top')):?>
        <!--Block bottomb-top-->
        <section id="block-bottomb-top" class="blk-footer-top">
            <div class="container">
                <div class="row">
                    <?php if( $this['block']->count('footer-top-left')):?>
                    <div class="col-xs-12 col-sm-<?php echo ($this['block']->count('footer-top') && $this['block']->count('footer-top-right'))?'4':( ($this['block']->count('footer-top') || $this['block']->count('footer-top-right'))?'8':'12' );?> pull-left footer-top-left">
                         <jdoc:include type="position" name="footer-top-left"/>
                    </div>
                    <?php endif;?>
                    <?php if( $this['block']->count('footer-top')):?>
                    <?php if ($footer_5 | $footer_14) { ?>
                        <div class="col-xs-12 col-sm-12 footer-top">
                    <?php } else {?>    
                        <div class="col-xs-12 col-sm-4 footer-top <?php echo ($this['block']->count('footer-top-left'))?'':'col-sm-offset-4';?>">
                    <?php }?>
                         <jdoc:include type="position" name="footer-top"/>
                    </div>
                    <?php endif;?>
                    <?php if( $this['block']->count('footer-top-right')):?>
                    <div class="col-xs-12 col-sm-4 pull-right footer-top-right">
                         <jdoc:include type="position" name="footer-top-right"/>
                    </div>
                    <?php endif;?>
                </div>
               
            </div>
        </section>
        <!--/Block bottomb-top-->
    <?php endif;?>

    <?php if( $this['block']->count('bottomb') ):?>
        <!--Block bottomb-->
        <section id="block-bottomb" class="blk-buttomb">
            <div class="container">
                <jdoc:include type="block" name="bottomb"/>
            </div>
        </section>
        <!--/Block bottomb-->
    <?php endif;?>

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