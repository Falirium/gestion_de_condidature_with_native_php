
<form action = "../controllers/ajouterDossier.php" method = "POST" enctype="multipart/form-data">
    <table class = "tab_form">

        <tr>
            <td>
                <label for="num">:رقم</label>
            </td>
            <td class = "form_td">
                <input type="text" name="num" class = "form_input"  required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="prenom">:المستغل</label>
            </td>
            <td class = "form_td">
                <input type="text" name="prenom" class = "form_input" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="sujet">:موضوع الرخصة</label>
            </td>
            <td class = "form_td">
                <input type="text" name="sujet" class = "form_input" required>
            </td>
        </tr>
        <tr>
            <td> :رقم القرار</td>
            <td>
                <input type="text" name="numero" class = "form_input" required>
            </td>
        </tr>
        <tr>
            <td> :تاريخ القرار</td>
            <td>
                <input type="date" name="dd" class = "form_input" required>
            </td>
        </tr>
        <tr>
            <td>: تاريخ بداية الرخصة</td>
            <td>
                <input type="date" name="dda" class = "form_input" required>
            </td>
        </tr>
        <tr>
            <td>: تاريخ إنتهاء الرخصة</td>
            <td>
                <input type="date" name="dfa" class = "form_input" required>
            </td>
        </tr>

        <tr>
            <td>
                <label for="surface">:المساحة</label>
            </td>
            <td class = "form_td">
                <input type="text" name="surface" class = "form_input" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="montant">:مبلغ الإتاوة السنوية</label>
            </td>
            <td class = "form_td">
                <input type="text" name="montant" class = "form_input" required>
            </td>
        </tr>

        <tr>
            <td>
                <label for="activite">: نوعية النشاط </label>
            </td>
            <td class = "form_td">
                <select name="activite" class = "form_input" required>
                    <option value="activite"> : نوعية النشاط </option>
                    <option value="أنشطة سياحية">أنشطة سياحية </option>
                    <option value="أنشطة تجارية">أنشطة تجارية</option>
                    <option value="مصانع">مصانع</option>
                    <option value="نقط تفريغ الأسماك ">نقط تفريغ الأسماك </option>
                    <option value="محطة الضخ">محطة الضخ </option>
                </select>
            </td>
        </tr>

        <tr>
            <td>
                <label for="situation">:الوضعية الحالية</label>
            </td>
            <td class = "form_td">
                <input type="text" name="situation" class = "form_input" required>
            </td>
        </tr>



        <tr>
            <td>
                <label for="decision">: الإجراءات المتخذة من طرف هذه المديرية </label>
            </td>
            <td class = "form_td">
                <input type="text" name="decision" class = "form_input" required>
            </td>
        </tr>



    </table>
    <table class = "tab_form">
        <tr>
            <td class = "form_td">
                <center><input type = "submit" name = "GO" value = "Ajouter" class = "form_input_2"></center>
            </td>
        </tr>
    </table>
</form>
