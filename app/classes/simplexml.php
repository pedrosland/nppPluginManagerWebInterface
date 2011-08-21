<?php

class SimpleXML{
	/**
     * Add SimpleXMLElement code into a SimpleXMLElement
     * @param SimpleXMLElement $main The SimpleXMLElement to append $append to
     * @param SimpleXMLElement $append
	 * 
	 * @author Alexandre FERAUD
	 * @see http://www.php.net/manual/en/simplexmlelement.addchild.php#104458
     */
    public static function appendXML($main, $append){
        if($append){
            if(strlen(trim((string) $append)) == 0){
                $xml = $main->addChild($append->getName());
                foreach($append->children() as $child){
                    self::appendXML($xml, $child);
                }
            }else{
                $xml = $main->addChild($append->getName(), (string) $append);
            }
			
            foreach($append->attributes() as $n => $v){
                $xml->addAttribute($n, $v);
            }
        }
    } 
}
