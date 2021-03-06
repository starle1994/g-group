@extends('layouts.master')

@section('content')
<style type="text/css">
     p{
        font-size: 14px !important;
        padding-left: 40px !important;
        padding-right: 40px !important;
        font-weight: bold;
    }
    .star{
        color: red;
    }
    .system .contentSyst .syscontent3 .ctImg3 img{
    min-height:auto;
    max-height: inherit;
}
</style>
<div class="row system">
     <div class="bbq-list-item">
        <div class="col-sm-3  col-xs-12 shop-list-home-left"">
            <div class="exe-fa-line">
                 @include('include.categories_left2')
            </div>     
        </div>

    </div>
                        
        <div class="col-sm-9 home-right">
            <img class="stTitl" src="{{asset('css/css/images/recruit/リクルート　バナー.jpg')}}" alt="">
            <div class="contentSyst">
                <div class="textSyst">
                    
                    <div class="ctImg3 anh-gioi-thieu">
                        <div style="padding-left: 0px; padding-right: 0px;" class="col-sm-6 col-xs-12">
                            <img src="{{asset('css/css/images/recruit/a1.png')}}" class="img-responsive" alt="">
                        </div>
                        <div style="padding-left: 0px; padding-right: 0px;" class="col-sm-6 col-xs-12">
                            <img src="{{asset('css/css/images/recruit/a2.png')}}" class="img-responsive" alt="">
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="text1" style="text-align: center;">
                        <p>数あるホスト求人のサイトの中からこのページに出会い、この文章を読んでいる…。</p>
                        <p>それはまさに <span class="txt-span">運命</span>です。</p>
                        <p>歌舞伎町で数々の実績を残し、名古屋に進出。</p>
                        <p>そしてわずか１年で総工費１億円にして１００坪の超大型店に拡大移転を成し遂げた</p>
                        <p>” <span class="txt-span">millionGOD</span>”から新たな改革が今始まる。。。</p>
                        <p>完全新規GOD２号店オープン！！</p>
                        <p> <span class="txt-span">G'sグループ</span>が繰り出す新たな新時代の幕開けを見逃すな！！</p>
                        <p>「ホストはやってみたいんだけど…不安だな。」</p>
                        <p>あなたのその不安や固定概念を打ち消し、そして新たな可能性を導き出し、</p>
                        <p>必ずや <span class="txt-span">名古屋に大旋風</span>を巻き起こすお店。</p>
                        <p>それが、私達です。</p>
                        <p>ホストは個人競技でもあり、団体競技でもあります。</p>
                        <p>東洋一の繁華街で言われる歌舞伎町で長年培った独自のシステムとカリキュラムで</p>
                        <p>その個人を育てその『個』が『輪』になって個人個人を助け合いチームとなって『 <span class="txt-span">Ｇ‘ｓグループ</span>』は成長して来ま</p>
                        <p>した。</p>
                        <p>そのスピードと勢いはまだまだ加速するでしょう！！</p>
                        <p>そして、ホストだけではなく、あらゆる方面に事業を拡大して行き、数多くの経営者を世に生み出していくグルー</p>
                        <p>プです。</p>
                        <p>あなたも是非！</p>
                        <p>その一員になって下さい！！</p>
                    </div>

                    <div class="titText-h1">
                        
                    </div>

                    <div class="titText-paraph">
                        <p>■18歳以上</p>
                        <p>(応相談) ※未経験者、学生大歓迎！</p>
                        <p>※お酒が飲めなくてもOK！</p>
                        <p>会話が苦手でもOK！</p>
                        <p>ルックスに自信がなくてもOK！</p>
                        <p>アルバイト感覚で週2日からでOKです！</p> <br><br>
                        <p>ホストをしてみたい。</p>
                        <p>その気持ちだけ持ってきてください!!</p>
                    </div>

                    <div class="titText-h2">
                        
                    </div>

                    <div class="bgContent">
                       <span>1・キャスト(レギュラー)</span>
                       <span>2.キャスト(アルバイト)</span>
                       <span>3.キャスト(経験者)</span>
                       <span>4.店舗運営スタッフ</span>
                       <span>5.スカウトマン(男・女)</span>

                       <span>6.ヘアメイク(男・女)</span>
                       <span>7.ダンサー・ＤＪ</span>
                       <span>8.送迎</span>
                       <span>9.キャッシャー専属</span>
                       <span>10.カメラマン</span>

                       <span>11.バーテンダー</span>
                       <span>12.調理師(キッチンスタッ</span>
                       <span>13.経理・事務</span>
                       <span>14.ウェイター</span>
                       <!-- <span>5.スカウトマン(男・女)</span> -->
                    </div>

                    <div class="titText-h3">
                    </div>

                    <div class="row titText-h3-content">
                        <div class="col-sm-6 pa" style="margin-top: 20px">
                            <p>1.キャスト（レギュラー）
                            最低保障10000円
                            (売上によるスライド制で最高70000円)
                            ＋売り上げバック＋指名､同伴バック
                            ＋固定高額ボーナス＋月ごとの高額ボ－ナス
                            ＋MVP賞
                            総売りの50～70％</p>

                            <p>2.キャスト（アルバイト）
                            日給8000円＋売上バック＋固定高額ボーナス
                            ＋月ごとの高額ボ－ナス＋MVP賞
                            売り上げの50～70％</p>

                            <p>3.キャスト（経験者）
                            総売りの50～70％＋役職手当
                            ＋固定高額ボーナス＋月ごとの高額ボ－ナス
                            ＋MVP賞</p>

                            <p>4.店舗運営スタッフ
                            28万円＋各種ボーナス＋各種歩合
                            (能力､経験を考慮)</p>

                            <p>
                                5.スカウトマン（男・女）
                                ひとり入店50000円～＋完全歩合
                                ＋各種ボーナス
                            </p>
                            <p>6.ヘアメイク（男・女）
                            1人セットにつき1,000円～2,000円（能力給）</p>

                            <p>7.ダンサー・DJ
                            ４～５時間勤務、日給8,000円 
                            ＋１ステージごとに 高額歩合有、忘相</p>     
                        </div>

                        <div class="col-sm-6 pa" style="margin-top: 20px">
                            <p>8.送迎
                            キャスト送迎、一人当たり1,000円～3,000円支給
                            距離や時間に応じて変動します。</p>

                            <p>9.キャッシャー専属
                            28万円＋各種ボーナス
                            ＋各種歩合(能力､経験を考慮)</p>

                            <p>10.カメラマン
                            撮影時人数、カット数、撮影時間に応じての日給 ＋ カット数歩合</p>

                            <p>11.バーテンダー
                            20万円＋各種ドリンクバック＋各種ボーナス
                            （能力、経験を考慮、フレアショー出来る方待遇!!）</p>

                            <p>12.調理師（キッチンスタッフ）
                            28万円＋各種フードバック＋各種ボーナス
                            （能力、経験を考慮）</p>

                            <p>13.経理・事務
                            28万円＋各種ボーナス
                            ＋各種歩合(能力､経験を考慮)</p>

                            <p>14.ウェイター
                            20万＋各種ボーナス＋各種歩合</p>
                        </div>
                    </div>

                    <div class="titText-h4">
                        
                    </div>
                    <div class="titText-h4-pa">
                        <p>[一部]19:00～24:00（アルバイト、学生の方応相談）</p>
                    </div>

                    <div class="titText-h6">
                        
                    </div>
                    <div class="titText-h6-pa">
                        <p>
                            <span class="star">☆暴力・派閥無し</span><br>
                            p上下関係・暴力・派閥など一切ありません!!アットホームで楽しく稼ぐならKIZUNAです!!
                        </p>

                        <p>
                            <span class="star">☆日払い・賞金有</span><br>
                            毎日の日払いはもちろんのこと、日々沢山の賞金GETのチャンスがあなたを待っています!!
                        </p>

                        <p>
                            <span class="star">☆高級マンション寮完備</span><br>
                            即入居可能な高級マンション寮を準備しています。
                            店舗からも徒歩5分圏内と近く憧れのホスト生活をスタート出来ます。  
                            他府県の方も身一つで来て下さい。
                        </p>

                        <p>
                            <span class="star">☆慰安旅行有</span><br>
                            しっかり働いた後はみんなでリフレッシュ。
                            みんなで楽しい時間と思い出を作りましょう!!
                        </p>

                        <p>
                            <span class="star">☆研修制度有</span><br>
                            未経験で稼げるようにしっかりとした研修制度!!
                            学生、Wワーク関係ありません。
                            最初は誰でも不安だし、出来なくて当たり前!!
                            始めはみんな未経験です。
                            そんなあなたを最短で稼げるホストにします。
                        </p>

                        <p>
                            <span class="star">☆ノルマ一切無し</span><br>
                            強制指名、同伴日など一切ありません。
                            もちろん理不尽な罰金等もありません。
                            自分ペースでやるのも良し、がんばって稼ぐのも良し、自分にあった頑張りで稼げます!!
                        </p>

                        <p>
                            <span class="star">☆完全シフト制出勤</span><br>
                            1週間ごとのシフト制なので安心してバランスを取りながら働くことが出来ます。
                        </p>

                        <p>
                            <span class="star">☆飲酒ＮＧでも可</span><br>
                            お酒が飲めなくても安心!!
                            ノンアルコールメニューの充実はもちろんの事、
                            今まで全くお酒が飲めない子達を何人も売れっ子に育て上げてきました。
                            その中でも1000万プレイヤーの代表も輩出した歴史もあります。
                            お酒が飲めなくても安心して下さい。
                            飲めなくても稼げるノウハウを響社長から直接教えていきます!!
                        </p>

                        <p>
                            <span class="star">☆ベア上昇制度有</span><br>
                            働く程上がっていく給料!!
                            『million GOD』では勤続年数に応じて給料が上がっていきます!!
                            よくホストクラブにある指名が取れないとどんどん給料が下がっていくという事は一切ありません。
                            『million GOD』では頑張って働くだけでそれも一つの結果としてあなたの頑張りを評価します!!
                        </p>

                        <p>
                            <span class="star">☆専属ヘアメイク有</span><br>
                            million GODには専属のヘアメイクさんがあなたを華麗に変身させます。
                            ホストへの第一歩を後押ししてくれます。
                        </p>

                        <p>
                            <span class="star">☆残業一切無し</span><br>
                            終電上がりとキッチリとした営業時間!!
                            時間制のお店なので営業時間が長引く事はありません。
                            そして学生やWワークの方でも働きやすく終電上がりで上がることも出来ます。
                        </p>

                        <p>
                            <span class="star">☆1日体験制度有</span><br>
                            実際にホストという仕事がどういうものか1日体験出来ます!!
                            お店に来て頂くだけで大丈夫です!!
                            後は僕らに任せて下さい!!
                            体験入店でも時給1,000円を保障させて頂きます。
                        </p>

                        <p>
                            <span class="star">☆高級スーツ貸与有</span><br>
                            スーツが無くても大丈夫!!
                            常時レンタルスーツ整っております。
                        </p>

                        <p>
                            <span class="star">☆上京費支給</span><br>
                            北は北海道、南は沖縄県まで当店で働くための交通費全額支給させて頂きます。
                            かばん一つでお越し下さい。
                        </p>

                        <p>
                            <span class="star">☆名古屋一の日給永久保障!!</span><br>
                            ホストクラブの全ての店舗が、日給保障が下がっていく中million GODはナント!!<br>
                            日給１万円永久保証!!<br>
                            売れてなくてもしっかり稼げる環境が整っています!!<br>
                        </p>

                        <p class="star">
                            ★入店祝い金支給!!<br>
                            入店おめでとうございます!!入店後、million GODでは、出勤日数にて高額入店祝い金を支給させて頂きます。詳細は面接時にて!!!
                        </p>

                        <p class="star">
                             ★友達と一緒に働こう!!<br>
                             一人でホストを始めるのは不安ですよね……是非友達と一緒に入店して下さい!!
                             友達を紹介、もしくは一緒に入店するだけで日給がどんどん上がって行きます!!
                        </p>                              
                    </div>

                    <div class="titText-h7">
                                      
                    </div>
                            
                    <div class="titText-h7-pa">
                        <p>[一部]19:00～24:00
                        （アルバイト、学生の方応相談）</p>
                    </div>

                    <div class="titText-h8">
                    </div>
                    <div class="syscontent3">
                        <div class="ctSys3">
                            <div class="flexImg3">
                                <div>Million GOD</div>
                            </div>
                        </div>
                        <div class="ctImg3">
                            <div>
                                <img src="{{asset('css/css/images/system/ct3Top1.png')}}" alt="">
                            </div>
                            <div>
                                <img class="im1" src="{{asset('css/css/images/system/ct3Top2.png')}}" alt="">
                                <img class="im2" src="{{asset('css/css/images/system/ct3Top3.png')}}" alt="">
                            </div>
                        </div>
                        <br>
                        <br>
                        {!! $shopslist[0]->apply_method !!}

                        <div class="dong-ke">
                            
                        </div>

                        <div class="ctSys3">
                            <div class="flexImg3">
                                <div>Gigolo</div>
                            </div>
                        </div>
                        <div class="ctImg3">
                            <div>
                                <img src="{{asset('css/css/images/system/ct3Top4.png')}}" alt="">
                            </div>
                            <div>
                                <img class="im1" src="{{asset('css/css/images/system/ct3Top5.png')}}" alt="">
                                <img class="im2" src="{{asset('css/css/images/system/ct3Top6.png')}}" alt="">
                            </div>
                        </div>
                        <br>
                        <br>
                        {!! $shopslist[1]->apply_method !!}

                    </div>


                    <div class="titText-h9">
                        
                    </div>
                    <div class="row titText-h9-ct">
                    <div class="col-md-12">
                        <div class="col-sm-6">
                            <h2>未経験者の方へ</h2>
                            <p>未経験者の方へ  このページを見て頂いているということは、<br>
「成功したい」　「お金が欲しい」　「女の子にモテたい」　「毎日の生活に刺激が欲しい」<br>
すなわち、今の環境を、そして"自分を変えたい"からだと思います。<br>

                            <p>私も初めはそうでした。</p>

                            <p>今売れている、稼いでいる、成功しているホストの誰もが最初は未経験者なのです。<br>
不安な気持ちは分かります。誰だって新しい事を始める時は不安でいっぱいです</p>

                            <p>でもだから、売れるんです。自分でも信じられないような努力が出来るんです。<br>
その先にあなたが今求めている理想の自分が待っているんです。</p>

                            <p>未経験者、大大大募集です！！</p>

                            <p>どんな店よりも早くあなたを売れっ子に育ててみせます！</p>

                            <p>「何も分からない」　「ホストに興味がある」<br>
だから素直に飛び込み、素直に取り組め、真っ直ぐに成長して行けるのです！！</p>

                            <p>余計な固定概念やメッセージはいりません。
ただ「やってみる」「始めてみる」それだけでいいのです！！</p>

                            <p>何も持ってない乾いたスポンジになったつもりで来てください！！<br>
そこに私達が一生懸命に愛を持って指導、教育し、たくさんの水を注いでいきます。</p>

                            <p>たくさん吸収して、たくさん絞り出し、<br>
                            あなたが求めていた、あなたらしい花を咲かせて下さい！！<br>
                            ホストとして躍動して下さい！！
                            全力でサポートしてみせます。</p>

                            <p>"踊らされるより、踊る人生を"</p>

                            <p>あなたが躍動できるステージが「Gigolo club」に必ずあります。<br>
可能性しかないこのグループであなたの可能性を試してください。<br>
一緒に夢を掴みましょう!!<br>
ご連絡お待ちしております。<br></p>
<br>
                        </div>

                        <div class="col-sm-6">
                            <h2>経験者の方へ</h2>

                            <p>このページを見て頂いてるということは、あなたに迷いや不満があるからだと思います。</p>

                            <p>今のお店に満足していますか？<br>
                            今のお給料に満足していますか？<br>
                            今の環境に満足していますか？<br>
                            今の立場に満足していますか？<br>
                            今の自分が好きですか？</p>
                            
                            <p>全部ぶっ壊してやりましょう！！</p>

                            <p>人はいつからでも生まれ変われます。<br>
ただ今までの経験や、プライドや、慣れが邪魔しているだけなのです。<br>
それこそが、あなたの可能性や成長を止めているのです。</p>

                            <p>時間は誰にでも平等に与えられます。<br>
しかし、あなたのその大切な若い時間、ホストが出来る期間は限られています。<br>
売れる為のノウハウや、ホストとして確立された自分<br>
成功する為に必要な物は、あなたはすでに持っているはずです。</p>

                            <p>時間を無駄にしないでください。
                            大事なのは"環境"、ただそれだけなのです。</p>  

                            <p>どんな悩み、不安、しがらみも、私達が全責任を持って解決します！！</p>

                            <p>「今のお店が辞められない」　「もう一度ホストをしても売れるか分からない」</p>

                            <p>大丈夫です。何でもご相談ください。</p>

                            <p>また０からホストとして勝負出来、、
                            名古屋1のグループと言わしめる”G'sグループ”の新店”gigolo club”
                            こんなチャンスは二度とありません！！</p>

                            <p>大切なのは１からではなく、０に戻る勇気。
                            そう、私達もまた原点に戻り０からの集団なんです。</p>

                            <p>そこにあなたの本当に飛躍出来る未来が待っています。</p>

                            <p>経験者のあなたにはどこのどんなお店よりも「良い給料システム」「良い環境」「良いポジション」「良いステージ」を与えてみせます。まずは一</p>                    
                        </div>
                    </div>

                <div class="row titText-h9-ct">
                    <div class="col-md-12">
                        <div class="col-sm-6">
                            <h2>移籍者の方へ</h2>
                            <p>そこの「あなた」困ってませんか？<br>
                            「昔、ホストをやってましたが期間が空いちゃって、、、、<br>
                            お店を辞めた際にお客様の電話番号を消去させられて、、、<br>
                            もう３０歳を超えてて、、、、、<br>
                            地方からの経験者なんですが、、、<br>
                            小さなお店だったので実力的に、、、<br>
                            元々自分で経営してたのですが今更、、、、、」<br>
                            などとその他いろいろな困りごとがあると思いますが<br>
                            任せてください。<br>
                            あなたをお最優先に考えた「莫大な恩恵」を持って心よりお待ちしています。</p>

                            <p>※実績</p>
                             <p>歌舞伎町 某有名店から7名移籍<br>
                            大阪ミナミ 某有名店から3名移籍<br>
                            横浜 某有名店から2名移籍<br>
                            名古屋 某有名店から3名移籍<br>
                            福岡 某有名店から1名移籍<br>
                            北海道 某有名店から1名移籍</p>
                            <br> <br> <br> 
                        </div>

                        <div class="col-sm-6">
                            <h2>他府県にお住まいの方へ</h2>
                            <p>最高です!!求めています!!<br>
                            僕も初めはそうでした。<br>
                            何故なら今の慣れた居心地の良い環境を離れる「 <span class="star">覚悟</span>」があるからです。<br>
                            その中に賭ける「 <span class="star">覚悟</span>」が、
                            人生において1番大切なのです!!</p>

                            <p>是非 <span class="star">片道キップ</span>で来てください。
                            その切符は私が責任を持って援助します。<br>
                            任せてください。試してください。</p>

                            <p>47都道府県、たくさんの仲間が出来れば最高じゃないですか。<br>
                            色々な刺激があればより未来が開けるじゃないですか</p>

                            <p>少しだけ <span class="star">勇気</span>を出して、まずは <span class="star">一歩</span>踏み出して下さい。
                            踏み出して良かったと思える日々を、
                            供に、そしてこの名古屋で成功の第一歩を踏み出しましょう!!</p>

                            <p>◆上京者特別特典◆</p>

                            <p class="star">「寮費2ヶ月無料」<br>
                            「生活用品一式支給」<br>
                            「ヘアメイク1ヶ月無料」<br>
                            「日給1万円永久保障」</p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
   </div>
</div> 
<script type="text/javascript">
$(document).ready(function() {
    window.onload = function(){
        var height = $('.system .contentSyst .syscontent3 .ctImg3 div:first-child').height();

        $('.system .contentSyst .syscontent3 .ctImg3 div:first-child img').height(height);
        };
    
    $(window).resize(function() {
        var height = $('.system .contentSyst .syscontent3 .ctImg3 div:first-child').height();
        $('.system .contentSyst .syscontent3 .ctImg3 div:first-child img').height(height);
    })
});
    
</script>           
@endsection