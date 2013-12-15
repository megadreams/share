    <header class="header float-area">
        <a class="non-decoration" href="<?php echo $view_data['base_url'] . 'lendborrow/list/' . $view_data['your_user_id']; ?>">
            <div class="header-back-btn float">
                戻る
            </div>
        </a>
        <div class="head-title float">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="head-right-btn float">
            　
        </div>
    </header>

    <section class="float-area balance-sheet">        
        <div class="balance-sheet-comment">
            <span class="newline">貸し借り情報を相手に通知することが出来ます</span>
        </div>        
        <form action="<?php echo $view_data['base_url'] . 'lendborrow/notice_confirm';?>" method="post">
            <input type="hidden" name="your_user_id" value="<?php echo $view_data['your_user_id']; ?>">
            
            <label class="newline">
                通知時間設定：<input tyoe="datetime" name="notice_date" value="">
            </label>
            <label class="newline">
                <input type="checkbox" name="notice_now">即時通知
            </label>
            通知媒体
            <label class="newline">
                <input type="radio" name="notice_device" value="mail" checked>Mail
            </label>
            <label class="newline">
                <input type="radio" name="notice_device" value="facebook">Facebook
            </label>                
            
            <input type="submit" value="登録">
            <?php if ($view_data['lend_and_borrow_summary']['sum'] != 0): ?>
                <label class="float-area newline">
                    <div class="float" >
                        <input type="radio" name="notice_id" value="all" checked> 
                    </div>
                    <div class="float">
                        <span class="newline">
                            貸借トータル通知
                        </span>
                        <span class="newline">
                            <?php if ($view_data['lend_and_borrow_summary']['sum'] > 0): ?>
                                <?php echo $view_data['lend_and_borrow_summary']['sum'];?>円 貸しています
                            <?php else:?>
                                <?php echo abs($view_data['lend_and_borrow_summary']['sum']);?>円 借りています                            
                            <?php endif;?>
                        </span>
                    </div>
                    <div class="float">
                        通知ログ
                    </div>
                </label>
            <?php endif;?>
            
            <?php if ($view_data['lend_and_borrow_summary']['lend'] > 0): ?>             
                <label class="float-area newline">
                    <div class="float" >
                        <input type="radio" name="notice_id" value="lend"> 
                    </div>
                    <div class="float">
                        <span class="newline">
                            貸している通知全部
                        </span>
                        <span class="newline">
                            <?php echo $view_data['lend_and_borrow_summary']['lend'];?>円 
                        </span>
                    </div>
                    <div class="float">
                        通知ログ
                    </div>
                </label>
            <?php endif;?>
            
            <?php if ($view_data['lend_and_borrow_summary']['borrow'] > 0): ?>             
                <label class="float-area newline">
                    <div class="float" >
                        <input type="radio" name="notice_id" value="lend"> 
                    </div>
                    <div class="float">
                        <span class="newline">
                            借りている通知全部
                        </span>
                        <span class="newline">
                            <?php echo $view_data['lend_and_borrow_summary']['borrow'];?>円 
                        </span>
                    </div>
                    <div class="float">
                        通知ログ
                    </div>
                </label>
            <?php endif;?>
            
            
            <?php foreach (array('lend', 'borrow') as $type): ?>
                <?php foreach ($view_data[$type] as $recode): ?>
                    <label class="float-area newline">
                        <div class="float" >
                            <input type="radio" name="notice_id" value="<?php echo $recode->id;?>">
                        </div>
                        <div class="float">
                            <span class="newline">
                                <?php echo date('Y/m/d', $recode->date); ?>
                                <?php echo $recode->money; ?>円
                            </span>
                            <span class="newline">
                                <?php echo $recode->memo; ?>                        
                            </span>
                        </div>
                        <div class="float">
                            通知ログ
                        </div>
                    </label>
                <?php endforeach; ?>
            <?php endforeach; ?>
            
        </form>           

    </section>