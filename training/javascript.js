//Generator stub for each block

Blockly.JavaScript['still'] = function(block) {
  var dropdown_action = block.getFieldValue('action');
  // TODO: Assemble JavaScript into code variable.
  var code = 'action;' + dropdown_action + ';';
  return code;
};

Blockly.JavaScript['walk'] = function(block) {
  var dropdown_action = block.getFieldValue('action');
  // TODO: Assemble JavaScript into code variable.
  var code = 'action;' + dropdown_action + ';';
  return code;
};

Blockly.JavaScript['speak'] = function(block) {
  var text_say = block.getFieldValue('say');
  // TODO: Assemble JavaScript into code variable.
  var code = 'speak;' + text_say + ";";
  return code;
};

Blockly.JavaScript['action_wait'] = function(block) {
  // TODO: Assemble JavaScript into code variable.
  var code = 'wait;;';
  return code;
};

Blockly.JavaScript['while'] = function(block) {
  var number_num = block.getFieldValue('num');
  var statements_actions = Blockly.JavaScript.statementToCode(block, 'actions');
  // TODO: Assemble JavaScript into code variable.
  var code = 'times;' + number_num + ';' + statements_actions + 'END;;';
  return code;
};

Blockly.JavaScript['bend'] = function(block) {
  var dropdown_options = block.getFieldValue('options');
  // TODO: Assemble JavaScript into code variable.
  var code = 'bend;' + dropdown_options + ';';
  return code;
};

Blockly.JavaScript['reachout'] = function(block) {
  // TODO: Assemble JavaScript into code variable.
  var code = 'reachout;;';
  return code;
};

Blockly.JavaScript['hands'] = function(block) {
  var dropdown_choice = block.getFieldValue('choice');
  // TODO: Assemble JavaScript into code variable.
  var code = 'hands;' + dropdown_choice + ';';
  return code;
};