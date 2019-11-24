<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
<xsl:template match="/">
    <html>
        <head>
            <title>Recipes</title>
            <style>
                #container { text-align: center; }
                h1 { font-style: italic ; color: green; } 
                table { width: 50%; margin-top: 30px; margin-bottom: 15px; } 
                #name { background-color: lightgreen; } 
                h4 { padding-top: 15px; padding-left: 20px; }
            </style>
        </head>
        <body>
        <div id="container">
        <div id="header">
            <h1>My Recipe Collection</h1>
        </div>
        <xsl:for-each select="cookbook/recipe">
        <div id="recipe" align="center">
        <table border="1">
            <tr id="name">
                <th colspan="2">
                <xsl:value-of select="name"/>
                </th>
            </tr>
            <tr>
                <th colspan="2">
                Score: <xsl:value-of select="score"/>
                </th>
            </tr>
            <xsl:for-each select="ingredient">
                <tr>
                    <td style="text-align: center">
                    <xsl:value-of select="name"/>
                    </td>
                    <td style="text-align: center">
                    <xsl:value-of select="amount"/>
                    </td>
                </tr>
            </xsl:for-each>
            <tr>
            <td colspan="2">
            <h4>Directions</h4>
            <ul>
                <xsl:for-each select="cooking">
                    <li>
                    <xsl:value-of select="."/>
                    </li>
                </xsl:for-each>
            </ul>
            </td>
            </tr>
            <tr>
            <td colspan="2">
            <h4>Nutrition Facts</h4>
            <ul>
                <xsl:for-each select="nutrition">
                    <li>
                    <xsl:value-of select="."/>
                    </li>
                </xsl:for-each>
            </ul>
            </td>
            </tr>
        </table>
        </div>
        </xsl:for-each>
        <hr/>
        <p>
            Return to previous page, click <a href="/hw7/hw7.html">here</a>.
        </p>
        </div>
        </body>
    </html>
</xsl:template>
</xsl:stylesheet>