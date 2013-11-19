    <header class="header float-area">
        <a class="non-decoration" href="<?php echo $view_data['base_url'] . 'lendborrow/top/'; ?>">
            <div class="header-back-btn float">
                TOPへ
            </div>
        </a>
        <div class="head-title float">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="header-pre-btn float">
            
        </div>
    </header>

    <?php //現在の貸し借り状況を確認できるようにする ?>
    <section class="float-area balance-sheet">
        <div class="w50p float">
            <div>
                貸
            </div>
            <div>
                <?php echo $view_data['lend_and_borrow_summary']['lend'];?>円;
            </div>
        </div>
        <div class="w50p float">
            <div>
                借
            </div>
            <div>
                <?php echo $view_data['lend_and_borrow_summary']['borrow'];?>円;
            </div>
        </div>
        <div>
            <?php $comment = ($view_data['lend_and_borrow_summary']['sum'] > 0)?'貸し':'借り';?>
            現在<?php echo number_format(abs($view_data['lend_and_borrow_summary']['sum']));?>円 <?php echo $comment;?>ています。
        </div>
    </section>


    <?php //タブ切り替えがいいな ?>
    <div class="float-area balance-sheet-boundary">
        <div id="lend" class="tab-btn w50p float tab-on">
            貸している
        </div>
        <div id="borrow" class="tab-btn w50p float">
            借りている
        </div>
    </div>

<?php $view = array('lend', 'borrow'); ?>
<?php foreach ($view as $type): ?>
    <section id="type-<?php echo $type;?>" class="<?php echo ($type === 'borrow')?'display-none':'';?>">
        <?php if (count($view_data['records'][$type]) > 0): ?>
            <?php foreach ($view_data['records'][$type] as $records): ?>
                <a href="<?php echo $view_data['base_url'] . 'lendborrow/detail/' . $type . '/' .$records->id;?>">
                    <div class="user-record float-area">
                        <div class="recode-left w30p float">
                            <span class="newline">
                                <?php echo date('Y年', $records->date); ?>
                            </span>  
                            <span class="newline">
                                <?php echo date('n月j日', $records->date); ?>
                            </span>  

                        </div>

                        <div class="recode-center w50p float">

                            <span class="newline">
                                <span style="zoom:30%;">                       
                                    <?php echo Asset::img('category/' . $records['category_mst_id'] . '.png'); ?>
                                </span>  
                                <?php echo $records->category_mst->category_name; ?>　:　<?php echo $records->money; ?>円
                            </span>
                            <span class="newline">
                                <?php echo $records->memo; ?>
                            </span>  
                        </div>
                        <div class="recode-right w20p float">
                            <span>
                                状態
                            </span>
                            <span class="status newline">
                                <?php echo $view_data['lendborrow_status'][$type][$records->status]; ?></span>
                            </span>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="lendborrow-nothing">
                現在<?php echo ($type === 'lend')?'貸し':'借り';?>ているものはありません
            </div>
        <?php endif; ?>
    </section>
<?php endforeach; ?>
<script>
$('.tab-btn').click(function(){
    if (this.id === 'lend') {
        $('#type-borrow').addClass('display-none');       
        $('#borrow').removeClass('tab-on');
        
        $('#type-lend').removeClass('display-none');        
        $('#lend').addClass('tab-on');
        
    } else {
        $('#type-lend').addClass('display-none');
        $('#lend').removeClass('tab-on');
        
        $('#type-borrow').removeClass('display-none');
        $('#borrow').addClass('tab-on');
    }
});
</script>
