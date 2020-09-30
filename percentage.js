function calculateTotal1(sscfmarks,sscm) {
        
        var totalAmt = document.getElementById(sscm);
        var total = document.getElementById(sscfmarks);
        totalR = eval((totalAmt / total) * 100);
        
        document.getElementById('update') = totalR;
    }
function calculateTotal2(hscfmarks,hscm) {
        
        var totalAmt = document.getElementById(hscm);
        var total = document.getElementById(hscfmarks);
        totalR = eval((totalAmt / total) * 100);
        
        document.getElementById('update2') = totalR;
    }
