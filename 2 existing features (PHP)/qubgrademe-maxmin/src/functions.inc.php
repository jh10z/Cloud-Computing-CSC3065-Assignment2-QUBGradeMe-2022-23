<?php
function getMaxMin($modules, $marks)
{
    $module_marks = array();
    for ($i = 0; $i < count($modules); $i++) {
      if(!empty($marks[$i]) || ($marks[$i] == 0 && is_numeric($marks[$i]))) {
        $module_marks_array = array("module"=>$modules[$i], "marks"=>$marks[$i]);
        array_push($module_marks,$module_marks_array);
      }
      
    }
    if(!$module_marks) {
      return NULL;
    }

    usort($module_marks, function($a, $b) {
          return $b['marks'] <=> $a['marks'];
    });

    $max_module = $module_marks[0]['module'] . ' - ' . $module_marks[0]['marks'];
    $min_module = $module_marks[count($module_marks)-1]['module'] . ' - ' . $module_marks[count($module_marks)-1]['marks'];

    return array($max_module,$min_module);
}
