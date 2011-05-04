<?php


/** 
 * Copyright (c) 2010 Fabian M <fabian.m@faabtech.com>
 *
 * More information about FaabBB may be found on these websites:
 *     http://faabtech.com/faabbb
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 */

class XMLUtils {
	
	/**
	 * Get the body of a tag
	 * @param $xml the simplexmlelement instance
	 * @return the body
	 */
	static function getBody($xml) {
		if (!$xml instanceof SimpleXMLElement)
			return "";
		$attributes = '';
		foreach($xml->attributes() as $attribute => $value)
			$attributes .=  $attribute . '="' . $value . '" ';	
		$firststring = '<'.$xml->getName() . ' ' .  $attributes . '>';
		$laststring = '</'.$xml->getName().'>'; 
	    $firstindex = strpos($xml->asXML(),$firststring);
	    $lastindex = strrchr($xml->asXML(), $laststring);
		return substr($xml->asXML(), $firstindex + strlen($firststring), $lastindex - strlen($lastindex));
	}
}

?>