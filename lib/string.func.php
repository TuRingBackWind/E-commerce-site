<?php
/**
 * ����Ψһ���ַ���
 * @return string
 */
function getUniName(){
    return md5(uniqid(microtime(true),true));
}
/**
 * �õ��ļ�����չ��
 * @param string $filename
 * @return string
 */
function getExt($filename){
    return strtolower(end(explode(".", $filename)));
}