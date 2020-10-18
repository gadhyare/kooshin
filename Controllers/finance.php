<?php class finance  extends Controller
{
    protected function index()
    {
        $viewmodel = new FinanceModel();
        $this->returnView($viewmodel->Index(), true);
    }

    protected function stuFee()
    {
        $viewmodel = new FinanceModel();
        $this->returnView($viewmodel->stuFee(), true);
    }

    protected function getEmpoinf()
    {
        $viewmodel = new FinanceModel();
        $this->returnView($viewmodel->getEmpoinf(), false);
    }
    protected function deploma()
    {
        $viewmodel = new FinanceModel();
        $this->returnView($viewmodel->deploma(), true);
    }

    protected function PaymentRes()
    {
        $viewmodel = new FinanceModel();
        $this->returnView($viewmodel->PaymentRes(), true);
    }


    protected function PaymentResedel()
    {
        $viewmodel = new FinanceModel();
        $this->returnView($viewmodel->PaymentResedel(), true);
    }

    protected function PaymentReseadd()
    {
        $viewmodel = new FinanceModel();
        $this->returnView($viewmodel->PaymentReseadd(), true);
    }

    protected function PaymentResedite()
    {
        $viewmodel = new FinanceModel();
        $this->returnView($viewmodel->PaymentResedite(), true);
    }
    protected function feeinfo()
    {
        $viewmodel = new FinanceModel();
        $this->returnView($viewmodel->feeinfo(), true);
    }

    protected function feeinfoadd()
    {
        $viewmodel = new FinanceModel();
        $this->returnView($viewmodel->feeinfoadd(), true);
    }

    protected function feeinfoedit()
    {
        $viewmodel = new FinanceModel();
        $this->returnView($viewmodel->feeinfoedit(), true);
    }

    protected function feeinfodel()
    {
        $viewmodel = new FinanceModel();
        $this->returnView($viewmodel->feeinfodel(), true);
    }

    protected function feeclasstran()
    {
        $viewmodel = new FinanceModel();
        $this->returnView($viewmodel->feeclasstran(), true);
    }

    protected function feeclasstrando()
    {
        $viewmodel = new FinanceModel();
        $this->returnView($viewmodel->feeclasstrando(), true);
    }

    protected function stufeeclasstrando()
    {
        $viewmodel = new FinanceModel();
        $this->returnView($viewmodel->stufeeclasstrando(), true);
    }

    protected function feepaid()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->feepaid(), true);
    }

    protected function updatestuFee()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->updatestuFee(), true);
    }

    protected function deletestuFee()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->deletestuFee(), true);
    }

    protected function paidstufee()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->paidstufee(), true);
    }

    protected function updatetransfee()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->updatetransfee(), true);
    }


    protected function updatetransfeedo()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->updatetransfeedo(), true);
    }


    protected function deletetransfeedo()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->deletetransfeedo(), true);
    }

    protected function delpaidstufee()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->delpaidstufee(), true);
    }


    protected function updatepaidstufee()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->updatepaidstufee(), true);
    }


    protected function paidstufeePrint()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->paidstufeePrint(), false);
    }

    protected function stufeereport()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->stufeereport(), true);
    }

    protected function stufeereportprint()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->stufeereportprint(), false);
    }

    protected function singlestufeereportprint()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->singlestufeereportprint(), false);
    }

    protected function stufeeindex()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->stufeeindex(), true);
    }



    protected function employeefinc()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->employeefinc(), true);
    }

    protected function expenssfnc()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->expenssfnc(), true);
    }

    protected function expensetype()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->expensetype(), true);
    }

    protected function expensetypeadd()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->expensetypeadd(), true);
    }

    protected function expensetypeupdate()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->expensetypeupdate(), true);
    }


    protected function expensetypedelete()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->expensetypedelete(), true);
    }

    //*========================================================= */
    //**=============================empfinance  */
    //*========================================================= */

    protected function empfinance()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->empfinance(), true);
    }



    //*========================================================= */
    //**=============================allowancetype  */
    //*========================================================= */

    protected function allowancetype()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->allowancetype(), true);
    }

    protected function deductiontype()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->deductiontype(), true);
    }




    //** ========================================================= */
    //** ===================== expensess   ======================= */
    //** ========================================================= */


    protected function expensess()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->expensess(), true);
    }



    //** ========================================================= */
    //** ===================== reports   ======================= */
    //** ========================================================= */


    protected function reports()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->reports(), true);
    }




    //** ========================================================= */
    //** ===================== getEmpSellay   ======================= */
    //** ========================================================= */


    protected function getempSellay()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->getempSellay(), false);
    }


    //** ========================================================= */
    //** ===================== empsellarypaid   ======================= */
    //** ========================================================= */


    protected function empsellarypaid()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->empsellarypaid(), true);
    }




    protected function empsellarypaidprint()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->empsellarypaidprint(), false);
    }

   protected function empcurrentsellarypaidprint()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->empcurrentsellarypaidprint(), false);
    }
    


    protected function empdeductionprint()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->empdeductionprint(), false);
    }

    protected function emprepdebtprint()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->emprepdebtprint(), false);
    }

    protected function emprepallowanceprint()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->emprepallowanceprint(), false);
    }

    protected function bankaccountreportprint()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->bankaccountreportprint(), false);
    }


       protected function searchexpensebydate()
    {
        $viewmodel = new FinanceModel();
        $this->ReturnView($viewmodel->searchexpensebydate(), false);
    }
 
}
