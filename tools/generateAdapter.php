<?php

/*
 * libkinetic
 *
 * Copyright (C) 2018 SOFe
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

declare(strict_types=1);

chdir(__DIR__ . "/../libkinetic/src");
$target = "SOFe/Libkinetic/Base/ComponentAdapter.php";
if(is_file($target)){
	unlink($target);
}
$componentList = [];
$interfaceList = [];
/** @var SplFileInfo $file */
foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator(".")) as $file){
	$path = (string) $file;
	if($path{0} === "." && ($path{1} === "/" || $path{1} === "\\")){
		if(str_endsWith($path, "Component.php")){
			$fqn = str_replace("/", "\\", substr($path, 2, -4));
			if($fqn !== "SOFe\\Libkinetic\\Base\\KineticComponent"){
				$componentList[] = $fqn;
			}
		}elseif(str_endsWith($path, "Interface.php")){
			$fqn = str_replace("/", "\\", substr($path, 2, -4));
			$interfaceList[] = $fqn;
		}
	}
}
usort($componentList, function(string $a, string $b){
	return array_slice(explode("\\", $a), -1)[0] <=> array_slice(explode("\\", $b), -1)[0];
});
usort($interfaceList, function(string $a, string $b){
	return array_slice(explode("\\", $a), -1)[0] <=> array_slice(explode("\\", $b), -1)[0];
});
$output = "<?php /** @noinspection PhpIncompatibleReturnTypeInspection */ /** @noinspection PhpUnusedAliasInspection */\n" .
	"\n" .
	"/*\n" .
	" * libkinetic\n" .
	" *\n" .
	" * Copyright (C) 2018 SOFe\n" .
	" *\n" .
	" * Licensed under the Apache License, Version 2.0 (the \"License\");\n" .
	" * you may not use this file except in compliance with the License.\n" .
	" * You may obtain a copy of the License at\n" .
	" *\n" .
	" *     http://www.apache.org/licenses/LICENSE-2.0\n" .
	" *\n" .
	" * Unless required by applicable law or agreed to in writing, software\n" .
	" * distributed under the License is distributed on an \"AS IS\" BASIS,\n" .
	" * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.\n" .
	" * See the License for the specific language governing permissions and\n" .
	" * limitations under the License.\n" .
	" *\n" .
	" * This file was generated by libkinetic tools/generateAdapter.php from libkinetic sources,\n" .
	" * which are also licensed under the License.\n" .
	" */\n" .
	"\n" .
	"declare(strict_types=1);\n" .
	"\n" .
	"namespace SOFe\\Libkinetic\\Base;\n" .
	"\n";
$uses = [];
foreach($componentList as $item){
	$uses[] = $item;
}
foreach($interfaceList as $item){
	$uses[] = $item;
}
sort($uses);
foreach($uses as $item){
	$output .= "use $item;\n";
}
$output .= "\n";
$output .= "/**\n";
$output .= " * This file generates template functions to access KineticNode->getComponent().\n";
$output .= " *\n";
$output .= " * (This file would be unneeded if we had template functions in PHP)\n";
$output .= " */\n";
$output .= "trait ComponentAdapter{\n";
$output .= "\tpublic abstract function getComponent(string \$class) : KineticComponent;\n";
//$output .= "\n";
//$output .= "\tpublic abstract function findComponentsByInterface(string \$interface, int \$assertMinimum = 0) : array;\n";

foreach($componentList as $item){
	$baseNameComponent = array_slice(explode("\\", $item), -1)[0];
//	$output .= "\n";
	$output .= "\tpublic final function as{$baseNameComponent}() : {$baseNameComponent}{\n";
	$output .= "\t\treturn \$this->getComponent($baseNameComponent::class);\n";
	$output .= "\t}\n";
}
foreach($interfaceList as $item){
	$baseNameInterface = array_slice(explode("\\", $item), -1)[0];
	$output .= "\n\n";
	$output .= "\tpublic final function as{$baseNameInterface}() : {$baseNameInterface}{\n";
	$output .= "\t\treturn \$this->findComponentsByInterface({$baseNameInterface}::class, 1)[0];\n";
	$output .= "\t}\n";
	$output .= "\n";
	$output .= "\t/** @return {$baseNameInterface}[] */\n";
	$output .= "\tpublic final function get{$baseNameInterface}s(int \$assertMinimum = 0) : array{\n";
	$output .= "\t\treturn \$this->findComponentsByInterface({$baseNameInterface}::class, \$assertMinimum);\n";
	$output .= "\t}\n";
}
$output .= "}\n";
file_put_contents($target, $output);
function str_endsWith(string $string, string $suffix) : bool{
	return substr($string, -strlen($suffix)) === $suffix;
}