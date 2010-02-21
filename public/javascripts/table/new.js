dw.shared.util.provide('dw.table.new');

/**
 * Behaviour for the table/new action
 */
dw.table['new'] = (function() {

    /** Container for public functions. */
    var self = {};

    /** Container for private functions. */
    var _ = {};

    /**
     * Initializes the object.
     */
    _.initialize = function () {
        $('#text').before('<p class="status">LiveCorrect enabled</p>');
        $('#text').bind('keyup keypress blur cut paste change', _.validate);
    };

    /**
     * Sets the background to white if the input is correct but incomplete;
     * red if incorrect; green if correct and complete.
     */
    _.validate = function () {
        var inputLines = $('#text').val().replace(/\r/g, '').split('\n');
        var answerLines = $('#answers').val().replace(/\r/g, '').split('\n');
        var result = _.validateProper(inputLines, answerLines);
        if (result.correct && result.complete) {
            $('#text').css('background-color', '#C1FF04');
        } else if (result.correct && !result.complete) {
            $('#text').css('background-color', '#FFF');
        } else if (!result.correct) {
            $('#text').css('background-color', '#FFF4F2');
        }
    };

    /**
     * Checks the correctness of the input.
     *
     * @param inputLines  the lines entered by the user
     * @param answerLines  the correct lines
     * @return  an object with two boolean properties: correct and complete
     */
    _.validateProper = function (inputLines, answerLines) {
        var result = { correct: true, complete: true };
        for (var i = 0; i < inputLines.length; i++) {
            var lineResult = _.validateLine(inputLines[i], answerLines[i]);
            result.correct = result.correct && lineResult.correct;
            result.complete = result.complete && lineResult.complete;
        }
        return result;
    };

    /**
     * Checks the correctness of the input line.
     *
     * @param inputLine  the line entered by the user
     * @param answerLine  the correct line
     * @return  an object with two boolean properties: correct and complete
     */
    _.validateLine = function (inputLine, answerLine) {
        if (answerLine.indexOf(':') === -1) {
            return { correct: true, complete: true };
        }
        var normalizedInputLine = inputLine.replace(/[^a-z]/ig, '');
        var normalizedAnswerLine = answerLine.replace(/[^a-z]/ig, '');
        return {
            correct: normalizedAnswerLine.indexOf(normalizedInputLine) === 0,
            complete: normalizedAnswerLine === normalizedInputLine
        };
    };

    /**
     * Provides access to private functions and variables, for unit testing.
     *
     * @return  the container for private members.
     */
    self.getPrivateMembersForTesting = function () {
        return _;
    };

    _.initialize();
    return self;

})();
