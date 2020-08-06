$(document).ready(function(){
    // Get the text area of the code
    var code = $(".codemirror-textarea")[0];
    var editor = CodeMirror.fromTextArea(code, {
        lineNumbers : true ,
        tabSize : 4,
		theme : "monokai",
		smartIndent : true,
		autofocus : true,
		matchBrackets: true,
		indentUnit : 4,
		styleActiveLine: true,
		autoCloseBrackets: true,
		extraKeys: {"Ctrl-Space": "autocomplete"},
        mode: "text/x-c++src"
	});
	editor.setValue("#include<bits/stdc++.h>\nusing namespace std;\n\nint main(){\n\tcout<<\"Hello World\";\n\treturn 0;\n}");
    $('#form').submit(function(e) {
		// Fade in the progress bar
		$('#output').hide();
		$('#output').html('<br/>Generating the output &nbsp;&nbsp;&nbsp; <img src="./images/loader.gif" />');
		$('#output').fadeIn();
		// Disable the submit button
		$('#form #submit').attr("disabled", "disabled");
		// Clear and hide any error messages
		$('#form .error').html('');
		// Set temporary variables for the script
		var isFocus=0;
        var isError=0;
        var value = editor.getValue();
		// Get the data from the form
		var code=$('#form #code').val();
		var input=$('#form #input').val();
		var language=$('#form #language').val();
		// Validate the data
		if($.trim(code)=='') {
			$('#form #errorCode').html('The code area is empty');
			$('#form #code').focus();
			isFocus=1;
			isError=1;
		}
		// Terminate the script if an error is found
		if(isError==1) {
			$('#output').html('');
			$('#output').hide();
			// Activate the submit button
			$('#form #submit').removeAttr("disabled", "disabled");
			return false;
		}
		$.ajaxSetup ({
			cache: false
		});
		var dataString = 'code='+ encodeURIComponent(code) + '&input=' + encodeURIComponent(input) + '&language=' + encodeURIComponent(language);
		$.ajax({
			type: "POST",
			url: "compile.php",
			data: dataString,
			success: function(msg) {
				$('#output').html(msg);
				$('#form #submit').removeAttr("disabled", "disabled");
			},
			error: function(ob,errStr) {
				$('#output').html('');
				// Activate the submit button
				$('#form #submit').removeAttr("disabled", "disabled");
			}
		});
		return false;
	});

	$('#language').on('change', function() {
		switch(this.value){
			case 'c':
				editor.setValue("#include<stdio.h>\n\nint main() {\n\tprintf(\"Hello, World!\");\n\treturn 0;\n}");
				editor.setOption("mode","text/x-csrc");
				break;
			case 'cpp':
				editor.setValue("#include<bits/stdc++.h>\nusing namespace std;\n\nint main() {\n\tcout<<\"Hello, World!\";\n\treturn 0;\n}");
				editor.setOption("mode","text/x-c++src");
				break;
			case 'java':
				editor.setValue("class Main {\n\tpublic static void main(String[] args) {\n\t\tSystem.out.println(\"Hello, World!\");\n\t }\n}");
				editor.setOption("mode","text/x-java");
				break;
			case 'python3':
				editor.setValue("print(\"Hello, World!\")");
				editor.setOption("mode","python");
				break;
		}		
	});

	$('#theme').on('change', function() {
		switch(this.value){
			case 'dark':
				editor.setOption("theme","monokai");
				break;
			case 'light':
				editor.setOption("theme","mdn-like");
				break;
		}
		
	});
});