(function ($) {
    jqUnit.module('dw.table.new Test');
    var _ = dw.table['new'].getPrivateMembersForTesting();

    jqUnit.test("validateLine should return { correct: true, complete: true } if answerLine does not contain a colon", function () {
        jqUnit.expect(1);
        jqUnit.isObj({ correct: true, complete: true }, _.validateLine('foo', 'bar'));
    });

    jqUnit.test("validateLine should return { correct: true, complete: true } if inputLine matches answerLine", function () {
        jqUnit.expect(1);
        jqUnit.isObj({ correct: true, complete: true }, _.validateLine('Gate (feminine)  :porta    portaeportae', 'Gate (feminine): porta portae portae'));
    });

    jqUnit.test("validateLine should return { correct: false, complete: false } if inputLine does not match answerLine", function () {
        jqUnit.expect(1);
        jqUnit.isObj({ correct: false, complete: false }, _.validateLine('Gate (feminine)  :porta    portaeportae', 'Gate (feminine): foo portae portae'));
    });

    jqUnit.test("validateLine should return { correct: true, complete: false } if inputLine matches the beginning of answerLine", function () {
        jqUnit.expect(1);
        jqUnit.isObj({ correct: true, complete: false }, _.validateLine('Gate (feminine)  :foo', 'Gate (feminine): foo portae portae'));
    });
})(jQuery);
