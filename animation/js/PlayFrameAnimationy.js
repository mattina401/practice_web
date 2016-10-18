/**
 * Created by kim on 2016-08-31.
 */
var _debug = $('debug');

var nIDNum = 0;
var arrID = [ 1, 2 ];
var arrFile = [ "1","2" ];
var bUseWHString = false;
var arrWString = [ "1","2" ];
var arrHString = [ "1","2" ];
var nActiveIDIndex = 0;
var nActiveID = 0;

var timerPreview = 0;
var nIndexPreview = 0;
var nIndexPreviewLast = -1;
var nWidth = 0;
var nHeight = 0;
var nSpeed = 500;
var strYMD = "";
var strHour = "";
var strFolder="";
var nHomeFolder=1;
var newimages=[];

function Animate()
{
    if( nIDNum <=0 )return;

    var strDivName="";
    if( nIndexPreviewLast != -1 )
    {
        strDivName = "p" + nIndexPreviewLast.toString();
        document.getElementById(  strDivName ).style.visibility = 'hidden';
    }

    var nIndex = arrID[ nIndexPreview ] - 1;
    strDivName = "p" + nIndex.toString();
    document.getElementById(  strDivName ).style.visibility = 'visible';

    nIndexPreviewLast = nIndex;

    nIndexPreview++;
    if( nIndexPreview >= nIDNum ) nIndexPreview = 0;

    timerPreview=setTimeout("Animate()", nSpeed );
}

function StopAnimate()
{
    clearTimeout( timerPreview );
    timerPreview = 0;
}
/*
 function SetFolderName( strDir )
 {
 strFolder = strDir;
 }*/

function SetFolderName( strDir1,  strDir2, strDir3 )
{
    strYMD = strDir1;
    strHour = strDir2;
    strFolder = strDir3;
}

function SetHomeFolder( nDir )
{
    nHomeFolder = nDir;
}

function GetFolderName()
{
    return strFolder;
}

function InitPreview()
{
    var i = 0;
    var strHTML = "";
    var dir_name = GetFolderName();

    var strWidth  = nWidth.toString();
    strWidth += "px";
    var strHeight = nHeight.toString();
    strHeight += "px";

    var strFolderFunny62 =	strFolder.substring( 0, 1 );

    $( "preview_box" ).style.visibility = "hidden";

    var nPicNum = 0;

    for( i=0; i<nIDNum; i++ )
    {
        var strDivName = "p" + i.toString();
        var strImgName = "pic" +  i.toString();

        var strImg0 ="";

        newimages[ i ] = new Image();

        if( nHomeFolder== 1 )
            strImg0 = "http://gifmaker.me/files/download/home/" + strYMD + "/" +  strHour  + "/" + strFolder + "/" + arrFile[ i ];
        else if( nHomeFolder== 8 )
            strImg0 = "http://148.251.91.98/000/" + strYMD + "/" +  strHour  + "/" + strFolder + "/" + arrFile[ i ];
        else
            strImg0 = "http://gifmaker.me/files/download/funny/" + strFolderFunny62 + "/" + strFolder + "/" + arrFile[ i ];

        if( !bUseWHString )
            strHTML += '<div id="'  + strDivName + '" class="preview" style="width:'+ strWidth +';height:' + strHeight +' ;">' + '<img id="' + strImgName + '" style="margin:0;padding:0;border:0px;width:' + strWidth + ';height:' + strHeight + ';">' + '</div>';
        else
        {
            var nPicW = arrWString[ i ];
            var nPicH = arrHString[ i ];


            //nWidth, nHeight

            if( nPicW == nWidth && nPicH == nHeight )
            {
                strHTML += '<div id="'  + strDivName + '" class="preview" style="width:'+ strWidth +';height:' + strHeight +' ;">' + '<img id="' + strImgName + '" style="margin:0;padding:0;border:0px;width:' + strWidth + ';height:' + strHeight + ';">' + '</div>';
            }
            else
            {
                //scale to same W
                var fScalePic = nPicW / nPicH;
                var fScaleDiv = nWidth / nHeight;

                var nNewW = 0;
                var nNewH  = 0;

                if( fScalePic > fScaleDiv )//w
                {
                    nNewW = nWidth;
                    nNewH = parseInt( nPicH * nWidth / nPicW  );
                }
                else//h
                {
                    nNewH = nHeight;
                    nNewW = parseInt( nPicW * nHeight / nPicH );
                }

                //	nNewW =  nPicW;
                //	nNewH = nPicH;

                var strWidthN  = nNewW.toString();
                strWidthN += "px";
                var strHeightN = nNewH.toString();
                strHeightN += "px";

                var nPaddingW = parseInt( ( nWidth - nNewW ) / 2 );
                var nPaddingH =  parseInt( ( nHeight - nNewH ) / 2 );

                var nDivW =  nNewW;
                var nDivH =  nNewH;

                var strDivW = nDivW.toString() + "px";
                var strDivH = nDivH.toString() + "px";

                var strPaddingW = nPaddingW.toString();
                var strPaddingH  = nPaddingH.toString();
                var strPadding = "padding:" + strPaddingH + "px " + strPaddingW + "px " + strPaddingH + "px " + strPaddingW + "px;";

                strHTML += '<div id="'  + strDivName + '" style="position:absolute;float:left;' + strPadding +  'width:'+ strDivW +';height:' + strDivH +' ;">' + '<img id="' + strImgName + '" style="margin:0;padding:0;border:0px;width:' + strWidthN + ';height:' + strHeightN + ';">' + '</div>';

            }
        }



        newimages[ i ].src = 	strImg0;
        newimages[ i ].onload = function() {

            nPicNum++;
            if( nPicNum == nIDNum )
                OnLoadAllPics();
            else
            {
                var nPercent = Math.floor( nPicNum / nIDNum * 100 );
                $( "Loading_box" ).innerHTML	=	"Loading... " + nPercent.toString() + "%";
            }
        };

    }

    $( "preview_box" ).innerHTML	= 	strHTML;
    $( "preview_box" ).style.width		=	strWidth;
    $( "preview_box" ).style.height	=	"0px";
}

function OnLoadAllPics()
{
    for( var i=0; i<nIDNum; i++ )
    {
        var strDivName = "p" + i.toString();
        var strImgName = "pic" +  i.toString();

        $( strImgName ).src =  newimages[ i ].src;
        $( strDivName ).style.visibility = "hidden";
    }

    $( "Loading_box" ).style.height	=	"0px";
    $( "Loading_box" ).style.visibility = "hidden";

    var strHeight = nHeight.toString();
    strHeight += "px";
    $( "preview_box" ).style.height	=	strHeight;

    $( "preview_box" ).style.visibility = "visible";

    Preview();
}

function Preview()
{
    StopAnimate();
    Animate();
}

function ResetImgNumber( n )
{
    arrID.length = n;
    nIDNum = n;
}

function DisplayImages()
{
    InitPreview();

}

function ReadFileName( strFileNameList )
{
    var nNum = arguments.length;

    if( nNum > 0 )
    {
        nIDNum = nNum;
        arrFile.length = nNum;

        for (var i = 0; i < nNum; i++)
        {
            arrFile[ i ]	= arguments[ i ];
        }

        ResetImgNumber( nNum );
    }
}



function ReadWHString( strWHList )
{
    var nNum = arguments.length;

    if( nNum > 0 )
    {
        bUseWHString = true;
        arrWString.length = nNum / 2;
        arrHString.length = nNum / 2;

        for (var i = 0; i < nNum; i+=2 )
        {
            arrWString[ i/2 ]	= arguments[ i ];
            arrHString[ i/2 ]	= arguments[ i + 1 ];
        }

    }
}

function ReadOrder( strOrder )
{
    var nNum = arguments.length;

    if( nNum > 0 )
    {
        if( nNum==nIDNum )
        {
            for (var i = 0; i < nNum; i++)
                arrID[ i ] = arguments[ i ];
        }
        else
        {
            for (var i = 0; i < nIDNum; i++)
                arrID[ i ] = i + 1;
        }
    }
}

function ReadWHS( strWHS )
{
    var nNum = arguments.length;

    if( nNum ==3  )
    {
        nWidth 	= arguments[ 0 ];
        nHeight = arguments[ 1 ];
        nSpeed = arguments[ 2 ];
    }
}

function $(id)
{
    return document.getElementById(id);
}