<%@ Page Title="Web Calculator" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="Default.aspx.cs" Inherits="LiveDemo._Default" %>

<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" runat="server">

    <div style="margin-top: 2rem;">
        <table>
            <tr>
                <td colspan="4">
                    <asp:TextBox class="LCD" ID="textLCD" runat="server" Columns="20" />
                </td>
            </tr>
            <tr>
                <td>
                    <asp:Button class="aspBtn" ID="btnCancel" Text="MS" runat="server" OnClick="btnMEM_Click" />
                    <asp:Button class="aspBtn" ID="btnSqrt" Text="MR" runat="server" OnClick="btnMEM_Click" />
                    <asp:Button class="aspBtn" ID="btnPerc" Text="MC" runat="server" OnClick="btnMEM_Click" />
                    <asp:Button class="aspBtn" ID="btnDiv" Text="÷" runat="server" OnClick="btnOperate_Click" />
                    <asp:Label class="label" id="labelMem" Text="Stored in Memory: " runat="server"/>
                </td>
            </tr>
            <tr>
                <td>
                    <asp:Button class="aspBtn" ID="btn7" Text="7" runat="server" OnClick="btnNum_Click" />
                    <asp:Button class="aspBtn" ID="btn8" Text="8" runat="server" OnClick="btnNum_Click" />
                    <asp:Button class="aspBtn" ID="btn9" Text="9" runat="server" OnClick="btnNum_Click" />
                    <asp:Button class="aspBtn" ID="btnMult" Text="x" runat="server" OnClick="btnOperate_Click" />
                    <asp:Label class="label"  id="labelLast" Text="Last Operation: " runat="server"/>
                </td>
            </tr>
            <tr>
                <td>
                    <asp:Button class="aspBtn" ID="btn4" Text="4" runat="server" OnClick="btnNum_Click" />
                    <asp:Button class="aspBtn" ID="btn5" Text="5" runat="server" OnClick="btnNum_Click" />
                    <asp:Button class="aspBtn" ID="btn6" Text="6" runat="server" OnClick="btnNum_Click" />
                    <asp:Button class="aspBtn" ID="btnMinus" Text="-" runat="server" OnClick="btnOperate_Click" />
                </td>
            </tr>
            <tr>
                <td>
                    <asp:Button class="aspBtn" ID="btn1" Text="1" runat="server" OnClick="btnNum_Click" />
                    <asp:Button class="aspBtn" ID="btn2" Text="2" runat="server" OnClick="btnNum_Click" />
                    <asp:Button class="aspBtn" ID="btn3" Text="3" runat="server" OnClick="btnNum_Click" />
                    <asp:Button class="aspBtn" ID="btnPlus" Text="+" runat="server" OnClick="btnOperate_Click" />
                </td>
            </tr>
            <tr>
                <td>
                    <asp:Button class="aspBtn" ID="btnC" Text="C" runat="server" OnClick="btnClear_Click" />
                    <asp:Button class="aspBtn" ID="btn0" Text="0" runat="server" OnClick="btnNum_Click" />
                    <asp:Button class="aspBtn" ID="btnDecimal" Text="." runat="server" OnClick="btnNum_Click" />
                    <asp:Button class="aspBtn" ID="btnEquals" Text="=" runat="server" OnClick="btnEquals_Click" />
                </td>
            </tr>
        </table>
    </div>

</asp:Content>
