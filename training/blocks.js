//The definition of each block

Blockly.Blocks['still'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("Still action")
        .appendField(new Blockly.FieldDropdown([["Sit down","sitting"], ["Stand up","standing"]]), "action");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(0);
    this.setTooltip('');
    this.setHelpUrl('');
  }
};

Blockly.Blocks['walk'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("Walk: ")
        .appendField(new Blockly.FieldDropdown([["forwards","walkfront"], ["backwards","walkback"]]), "action");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(0);
    this.setTooltip('');
    this.setHelpUrl('');
  }
};

Blockly.Blocks['speak'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("Say:")
        .appendField(new Blockly.FieldTextInput(""), "say");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(330);
    this.setTooltip('');
    this.setHelpUrl('');
  }
};

Blockly.Blocks['action_wait'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("Wait");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(0);
    this.setTooltip('');
    this.setHelpUrl('');
  }
};

Blockly.Blocks['while'] = {
  init: function() {
    this.appendStatementInput("actions")
        .setCheck(null)
        .appendField("Repeat")
        .appendField(new Blockly.FieldNumber(1, 1, 10), "num")
        .appendField("times");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(30);
    this.setTooltip('');
    this.setHelpUrl('');
  }
};

Blockly.Blocks['bend'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("Bend")
        .appendField(new Blockly.FieldDropdown([["legs","legs"], ["arms","arms"]]), "options");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(150);
    this.setTooltip('');
    this.setHelpUrl('');
  }
};

Blockly.Blocks['reachout'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("Reach out");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(165);
    this.setTooltip('');
    this.setHelpUrl('');
  }
};

Blockly.Blocks['hands'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("Hands")
        .appendField(new Blockly.FieldDropdown([["open","open"], ["close","close"]]), "choice");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(105);
    this.setTooltip('');
    this.setHelpUrl('');
  }
};
